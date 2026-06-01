<?php

namespace Tests\Feature\Auth;

use App\Models\MagicLoginToken;
use App\Models\User;
use App\Notifications\MagicLoginLink;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Tests\TestCase;

class MagicLoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_request_magic_link(): void
    {
        Notification::fake();

        $user = User::factory()->create();

        $response = $this->post(route('magic-login.store'), [
            'email' => $user->email,
        ]);

        $response->assertSessionHas('status');

        $this->assertDatabaseCount('magic_login_tokens', 1);
        Notification::assertSentTo($user, MagicLoginLink::class);
    }

    public function test_unknown_email_does_not_send_magic_link(): void
    {
        Notification::fake();

        $response = $this->post(route('magic-login.store'), [
            'email' => 'unknown@example.com',
        ]);

        $response->assertSessionHas('status');

        $this->assertDatabaseCount('magic_login_tokens', 0);
        Notification::assertNothingSent();
    }

    public function test_user_can_authenticate_with_magic_link(): void
    {
        $user = User::factory()->create();
        $plainTextToken = Str::random(64);

        $magicLoginToken = MagicLoginToken::create([
            'user_id' => $user->id,
            'token' => hash('sha256', $plainTextToken),
            'expires_at' => now()->addMinutes(15),
        ]);

        $response = $this->get(route('magic-login.consume', [
            'token' => $plainTextToken,
        ]));

        $response->assertRedirect(route('dashboard', absolute: false));
        $this->assertAuthenticatedAs($user);
        $this->assertNotNull($magicLoginToken->fresh()->used_at);
    }

    public function test_magic_link_cannot_be_reused(): void
    {
        $user = User::factory()->create();
        $plainTextToken = Str::random(64);

        MagicLoginToken::create([
            'user_id' => $user->id,
            'token' => hash('sha256', $plainTextToken),
            'expires_at' => now()->addMinutes(15),
            'used_at' => now(),
        ]);

        $response = $this->from(route('login'))->get(route('magic-login.consume', [
            'token' => $plainTextToken,
        ]));

        $response->assertRedirect(route('login'));
        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_disabled_user_cannot_receive_or_use_magic_link(): void
    {
        Notification::fake();

        $user = User::factory()->disabled()->create();

        $this->post(route('magic-login.store'), [
            'email' => $user->email,
        ])->assertSessionHas('status');

        $this->assertDatabaseCount('magic_login_tokens', 0);
        Notification::assertNothingSent();

        $plainTextToken = Str::random(64);

        MagicLoginToken::create([
            'user_id' => $user->id,
            'token' => hash('sha256', $plainTextToken),
            'expires_at' => now()->addMinutes(15),
        ]);

        $response = $this->from(route('login'))->get(route('magic-login.consume', [
            'token' => $plainTextToken,
        ]));

        $response->assertRedirect(route('login'));
        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }
}
