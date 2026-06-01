<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_access_user_management(): void
    {
        $this->get('/admin/users')->assertRedirect(route('login'));
    }

    public function test_standard_user_cannot_access_user_management(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)->get('/admin/users')->assertForbidden();
    }

    public function test_superadmin_can_view_user_management(): void
    {
        $admin = User::factory()->superAdmin()->create();
        $managedUser = User::factory()->create([
            'name' => 'Managed User',
            'email_verified_at' => null,
        ]);

        $response = $this->actingAs($admin)->get('/admin/users');

        $response
            ->assertOk()
            ->assertSee('Manage account access')
            ->assertSee('Managed User')
            ->assertSee($managedUser->email);
    }

    public function test_superadmin_can_promote_another_user(): void
    {
        $admin = User::factory()->superAdmin()->create();
        $managedUser = User::factory()->create(['is_super_admin' => false]);

        $this->actingAs($admin)
            ->patch(route('admin.users.super-admin', $managedUser))
            ->assertRedirect();

        $this->assertTrue($managedUser->fresh()->is_super_admin);
    }

    public function test_superadmin_can_toggle_email_verification(): void
    {
        $admin = User::factory()->superAdmin()->create();
        $managedUser = User::factory()->unverified()->create();

        $this->actingAs($admin)
            ->patch(route('admin.users.verification', $managedUser))
            ->assertRedirect();

        $this->assertNotNull($managedUser->fresh()->email_verified_at);
    }

    public function test_superadmin_can_create_user(): void
    {
        $admin = User::factory()->superAdmin()->create();

        $this->actingAs($admin)
            ->post(route('admin.users.store'), [
                'name' => 'New User',
                'email' => 'new.user@example.com',
                'password' => 'Password123!',
                'password_confirmation' => 'Password123!',
                'email_verified' => '1',
                'is_super_admin' => '0',
            ])
            ->assertRedirect();

        $this->assertDatabaseHas('users', [
            'name' => 'New User',
            'email' => 'new.user@example.com',
            'is_super_admin' => 0,
        ]);
    }

    public function test_superadmin_can_disable_user(): void
    {
        $admin = User::factory()->superAdmin()->create();
        $managedUser = User::factory()->create();

        $this->actingAs($admin)
            ->patch(route('admin.users.disabled', $managedUser))
            ->assertRedirect();

        $this->assertNotNull($managedUser->fresh()->disabled_at);
    }
}
