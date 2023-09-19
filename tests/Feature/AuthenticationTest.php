<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_users_can_authenticate_using_the_login_screen(): void
    {
        $user = User::factory()->make([
            'name' => 'Test User',
            'email' => 'test@gamekafe.com',
            'password' => Hash::make('123456789As!'),
            'email_verified_at' => date('Y-m-d H:i:s'),
            'role' => 'user',
            'image' => 'sdadsadsadsad',
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $user->password,
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_users_can_not_authenticate_with_invalid_password(): void
    {
        $user = User::factory()->make([
            'name' => 'Test User',
            'email' => 'test@gamekafe.com',
            'password' => Hash::make('123456789As!'),
            'email_verified_at' => date('Y-m-d H:i:s'),
            'role' => 'user',
            'image' => 'sdadsadsadsad',
        ]);

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }
}
