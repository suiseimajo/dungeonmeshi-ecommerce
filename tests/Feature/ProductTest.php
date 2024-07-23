<?php

namespace Tests\Feature;

use Database\Factories\ProductFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;
use App\Models\User;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {

        $user = User::factory()->create();
        $product = Product::factory()->create();

        $response = $this
            ->actingAs($user)
            ->post('produtos', [
                'nome' => 'Test Product',
                'slug' => 'test-product',
                'preco' => '1000',
                'imagem' => '',
                'descricao' => 'guitar loneliness and blue planet'
            ]);

        $response
        ->assertSessionHasNoErrors()
        ->assertRedirect('/');

        $product->refresh();

        $this->assertDatabaseHas('products', [
            'nome' => 'Test Product',
            'preco' => '1000'
        ]);
    }
}
