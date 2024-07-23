<?php

namespace Tests\Feature;

use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->post('usuarios', [
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => '12345678',
                'password_confirmation' => '12345678'
            ]);


        $response
        ->assertSessionHasNoErrors()
        ->assertRedirect('usuarios');

        $user->refresh();

        $this->assertDatabaseHas('users', [
            'name' => 'Test User',
            'email' => 'test@example.com'
        ]);

    }
}
