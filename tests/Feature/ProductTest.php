<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Tests\TestCase;

class ProductTest extends TestCase
{
    public function test_products_page_is_displayed(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/products');

        $response->assertStatus(200);
    }

    public function test_product_page_is_displayed(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/product');

        $response->assertStatus(200);
    }

    public function test_create_product(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->put('/product', [
                'name' => 'Test Product',
                'description' => 'Just a product description',
                'price' => 1.00,
                'qty' => 10,
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/products');
    }

    public function test_product_page_is_displayed_with_information(): void
    {
        $user = User::factory()->create();
        $product = Product::firstWhere('name', 'Test Product');

        $response = $this
            ->actingAs($user)
            ->get('/product/' . $product->id);

        $response->assertStatus(200);
    }

    public function test_update_product(): void
    {
        $user = User::factory()->create();
        $product = Product::firstWhere('name', 'Test Product');

        $new_product_info = [
            'name' => 'Test Product chaged',
            'description' => 'Just a product description changed',
            'price' => 1.00,
            'qty' => 10,
        ];

        $response = $this
            ->actingAs($user)
            ->patch('/product/' . $product->id, $new_product_info);

        $product->refresh();

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/product/' . $product->id);

        $this->assertSame($new_product_info['name'], $product->name);
        $this->assertSame($new_product_info['description'], $product->description);
    }

}
