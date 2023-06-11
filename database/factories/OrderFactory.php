<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => rand(1, 50),
            'date_readiness' => fake()->dateTimeBetween('-3 years'),
            'quantity' => rand(1, 20),
            'amount' => fake()->randomNumber(5),
            'status' => fake()->randomElement(['новый', 'в процессе', 'выполнен', 'отменен']),
        ];
    }
}
