<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
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
            'title'=> fake()->unique()->numerify('Продукт-###'),
            'category_id' => rand(1, 3),
            'size_id' => rand(1, 3),
            'expiration_date' => rand(24, 3000),
            'product_value' => fake()->sentence(),
            'description' =>  fake()->text(300),
            'ingredients' =>  fake()->text(400),
            'weight' => rand(300, 2000),
            'price' => rand(300, 10000),
            'photo' => fake()->imageUrl(category: 'cake'),
            'status' => fake()->randomElement(['active', 'inactive']),
        ];
    }
}
