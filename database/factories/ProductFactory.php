<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => fake()->int(),
            'name' => fake()->title(),
            'description' => fake()->paragraph(),
            'price' => now(),
            'qty' => fake()->randomNumber(5, false)
        ];
    }
}
