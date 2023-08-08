<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class Customer extends TestCase
{
    public function test_customers_page_is_displayed(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/customers');

        $response->assertStatus(200);
    }

    public function test_customer_page_is_displayed(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/customer');

        $response->assertStatus(200);
    }

    public function test_create_customer(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->put('/customer', [
                'name' => 'Test customer',
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/customers');
    }

    public function test_customer_page_is_displayed_with_information(): void
    {
        $user = User::factory()->create();
        $customer = customer::firstWhere('name', 'Test customer');

        $response = $this
            ->actingAs($user)
            ->get('/customer/' . $customer->id);

        $response->assertStatus(200);
    }

    public function test_update_customer(): void
    {
        $user = User::factory()->create();
        $customer = customer::firstWhere('name', 'Test customer');

        $new_customer_info = [
            'name' => 'Test customer chaged',
        ];

        $response = $this
            ->actingAs($user)
            ->patch('/customer/' . $customer->id, $new_customer_info);

        $customer->refresh();

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/customer/' . $customer->id);

        $this->assertSame($new_customer_info['name'], $customer->name);
        $this->assertSame($new_customer_info['description'], $customer->description);
    }
}
