<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Laravel\Jetstream\Http\Livewire\UpdatePasswordForm;
use Livewire\Livewire;
use Tests\TestCase;

class UpdatePasswordTest extends TestCase
{
    use RefreshDatabase;

    public function test_password_can_be_updated(): void
    {
        $newPassword = '123456789As!@#';

        $this->actingAs($user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@gamekafe.com',
            'password' => Hash::make('123456789As!'),
            'email_verified_at' => date('Y-m-d H:i:s'),
            'role' => 'user',
            'image' => 'sdadsadsadsad',
        ]));

        $response = $this->call(
            'PUT',
            route('update-password'),
            array(
                '_token' => csrf_token(),
                'current_password' => $user->password,
                'new_password' => $newPassword,
                'new_password_confirmation' => $newPassword,
            )
        );

        $response->assertStatus(405);
        $this->assertFalse(Hash::check($newPassword, $user->password));
    }

    public function test_current_password_must_be_correct(): void
    {
        $newPassword = '123456789As!@#';
        $wrongPassword = '1213213@#asda';
        $currentPassword = '123456789As!';

        $this->actingAs($user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@gamekafe.com',
            'password' => Hash::make('123456789As!'),
            'email_verified_at' => date('Y-m-d H:i:s'),
            'role' => 'user',
            'image' => 'sdadsadsadsad',
        ]));

        $response = $this->call(
            'PUT',
            route('update-password'),
            array(
                '_token' => csrf_token(),
                'current_password' => $wrongPassword,
                'new_password' => $newPassword,
                'new_password_confirmation' => $newPassword,
            )
        );

        $response->assertStatus(405);
        $this->assertTrue(Hash::check($currentPassword, $user->password));
    }

    public function test_new_passwords_must_match(): void
    {
        $newPassword = '123456789As!@#';
        $wrongPassword = '1213213@#asda';

        $this->actingAs($user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@gamekafe.com',
            'password' => Hash::make('123456789As!'),
            'email_verified_at' => date('Y-m-d H:i:s'),
            'role' => 'user',
            'image' => 'sdadsadsadsad',
        ]));

        $response = $this->call(
            'PUT',
            route('update-password'),
            array(
                '_token' => csrf_token(),
                'current_password' => $user->password,
                'new_password' => $wrongPassword,
                'new_password_confirmation' => $newPassword,
            )
        );

        $response->assertStatus(405);
        $this->assertFalse(Hash::check($wrongPassword, $newPassword));
    }
}
