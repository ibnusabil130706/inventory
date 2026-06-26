<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'quantity' => fake()->numberBetween(1, 100),
            'price' => fake()->numberBetween(1000, 100000),
            'category_id' => 1,
        ];
    }
}