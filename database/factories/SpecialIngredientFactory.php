<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SpecialIngredient>
 */
class SpecialIngredientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
//            'name'=> 'ингредиент №' . Str::random(rand(1, 10)),
            'name'=> 'ингредиент №' . fake()->unique()->randomNumber(5, false),
        ];
    }
}
