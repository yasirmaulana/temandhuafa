<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class LoginAppTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_app_page_can_be_rendered()
    {
        $this->get('/loginapp')->assertStatus(200);
    }

    public function test_authenticated_user_is_redirected_from_login_page()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get('/loginapp')
            ->assertRedirect('/akun/dashboard-donatur');
    }

    public function test_user_can_login_with_valid_credentials()
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
        ]);

        Livewire::test('login-app')
            ->set('email', 'test@example.com')
            ->set('password', 'password123')
            ->call('auth_login')
            ->assertRedirect('/akun/dashboard-donatur');

        $this->assertAuthenticatedAs($user);
    }

    public function test_user_cannot_login_with_invalid_credentials()
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
        ]);

        Livewire::test('login-app')
            ->set('email', 'test@example.com')
            ->set('password', 'wrong-password')
            ->call('auth_login')
            ->assertHasErrors(['email']);

        $this->assertGuest();
    }
}
