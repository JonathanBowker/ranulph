<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function testWelcomePageLoadsForGuests()
    {
        $response = $this->get('/');

        $response
            ->assertStatus(200)
            ->assertSee('Welcome to your client operations portal')
            ->assertSee('Sign in');
    }

    public function testPortalRoutesRequireAuthentication()
    {
        $this->get('/dashboard')->assertRedirect(route('login'));
        $this->get('/workspaces')->assertRedirect(route('login'));
        $this->get('/billing')->assertRedirect(route('login'));
        $this->get('/support')->assertRedirect(route('login'));
    }

    public function testAuthenticatedUserCanAccessPortalRoutes()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $this->get('/dashboard')->assertOk()->assertSee('Operations Hub');
        $this->get('/workspaces')->assertOk()->assertSee('Workspace Registry');
        $this->get('/billing')->assertOk()->assertSee('Billing Control');
        $this->get('/support')->assertOk()->assertSee('Support Operations');
    }
}
