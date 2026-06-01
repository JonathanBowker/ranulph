<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Config;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\User as SocialiteUser;
use Mockery;
use Tests\TestCase;

class LinkedInAuthenticationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Config::set('services.linkedin-openid', [
            'client_id' => 'linkedin-client-id',
            'client_secret' => 'linkedin-client-secret',
            'redirect' => '/auth/linkedin/callback',
        ]);
    }

    public function test_user_can_be_redirected_to_linkedin(): void
    {
        $provider = Mockery::mock();
        $provider->shouldReceive('scopes')
            ->once()
            ->with(['openid', 'profile', 'email'])
            ->andReturnSelf();
        $provider->shouldReceive('redirect')
            ->once()
            ->andReturn(redirect('https://linkedin.test/oauth'));

        Socialite::shouldReceive('driver')
            ->once()
            ->with('linkedin-openid')
            ->andReturn($provider);

        $this->get(route('auth.linkedin.redirect'))
            ->assertRedirect('https://linkedin.test/oauth');
    }

    public function test_new_user_can_authenticate_with_linkedin(): void
    {
        $this->mockLinkedInUser(
            $this->linkedInUser(
                id: 'linkedin-123',
                name: 'Taylor Example',
                email: 'taylor@example.com',
                avatar: 'https://cdn.linkedin.test/avatar.jpg',
                emailVerified: true,
            ),
        );

        $response = $this->get(route('auth.linkedin.callback'));

        $user = User::query()->firstOrFail();

        $response->assertRedirect(route('dashboard', absolute: false));
        $this->assertAuthenticatedAs($user);
        $this->assertSame('linkedin-123', $user->linkedin_id);
        $this->assertSame('https://cdn.linkedin.test/avatar.jpg', $user->linkedin_avatar);
        $this->assertNotNull($user->email_verified_at);
    }

    public function test_existing_user_can_be_linked_by_email(): void
    {
        $user = User::factory()->unverified()->create([
            'email' => 'taylor@example.com',
            'linkedin_id' => null,
        ]);

        $this->mockLinkedInUser(
            $this->linkedInUser(
                id: 'linkedin-456',
                name: 'Taylor Example',
                email: 'taylor@example.com',
                avatar: 'https://cdn.linkedin.test/taylor.jpg',
                emailVerified: true,
            ),
        );

        $response = $this->get(route('auth.linkedin.callback'));

        $response->assertRedirect(route('dashboard', absolute: false));
        $this->assertAuthenticatedAs($user->fresh());
        $this->assertSame('linkedin-456', $user->fresh()->linkedin_id);
        $this->assertNotNull($user->fresh()->email_verified_at);
    }

    public function test_existing_linked_user_can_authenticate_without_email(): void
    {
        $user = User::factory()->create([
            'linkedin_id' => 'linkedin-789',
        ]);

        $this->mockLinkedInUser(
            $this->linkedInUser(
                id: 'linkedin-789',
                name: 'Taylor Example',
                email: null,
                avatar: 'https://cdn.linkedin.test/taylor.jpg',
                emailVerified: false,
            ),
        );

        $response = $this->get(route('auth.linkedin.callback'));

        $response->assertRedirect(route('dashboard', absolute: false));
        $this->assertAuthenticatedAs($user->fresh());
    }

    public function test_linkedin_sign_in_requires_email_for_first_time_user(): void
    {
        $this->mockLinkedInUser(
            $this->linkedInUser(
                id: 'linkedin-no-email',
                name: 'Taylor Example',
                email: null,
                avatar: null,
                emailVerified: false,
            ),
        );

        $response = $this->from(route('login'))->get(route('auth.linkedin.callback'));

        $response->assertRedirect(route('login'));
        $response->assertSessionHasErrors('email');
        $this->assertGuest();
        $this->assertDatabaseCount('users', 0);
    }

    public function test_disabled_user_cannot_authenticate_with_linkedin(): void
    {
        $user = User::factory()->disabled()->create([
            'linkedin_id' => 'linkedin-disabled',
        ]);

        $this->mockLinkedInUser(
            $this->linkedInUser(
                id: 'linkedin-disabled',
                name: $user->name,
                email: null,
                avatar: null,
                emailVerified: false,
            ),
        );

        $response = $this->from(route('login'))->get(route('auth.linkedin.callback'));

        $response->assertRedirect(route('login'));
        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    protected function mockLinkedInUser(SocialiteUser $socialiteUser): void
    {
        $provider = Mockery::mock();
        $provider->shouldReceive('user')
            ->once()
            ->andReturn($socialiteUser);

        Socialite::shouldReceive('driver')
            ->once()
            ->with('linkedin-openid')
            ->andReturn($provider);
    }

    protected function linkedInUser(
        string $id,
        ?string $name,
        ?string $email,
        ?string $avatar,
        bool $emailVerified,
    ): SocialiteUser {
        return (new SocialiteUser())
            ->map([
                'id' => $id,
                'name' => $name,
                'email' => $email,
                'avatar' => $avatar,
            ])
            ->setRaw([
                'sub' => $id,
                'name' => $name,
                'email' => $email,
                'email_verified' => $emailVerified,
                'picture' => $avatar,
            ]);
    }
}
