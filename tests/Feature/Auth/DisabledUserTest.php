<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DisabledUserTest extends TestCase
{
    use RefreshDatabase;

    public function test_disabled_user_cannot_authenticate(): void
    {
        $user = User::factory()->disabled()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response
            ->assertSessionHasErrors('email')
            ->assertRedirect();

        $this->assertGuest();
    }

    public function test_disabled_authenticated_user_is_logged_out_on_next_request(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/dashboard');

        $response->assertOk();

        $user->forceFill(['disabled_at' => now()])->save();

        $response = $this
            ->actingAs($user)
            ->from('/dashboard')
            ->get('/dashboard');

        $response->assertRedirect(route('login'));
        $this->assertGuest();
    }
}
