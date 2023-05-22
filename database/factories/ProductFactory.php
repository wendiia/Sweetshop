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
        $photo_cakes = ['main/img/cake1.jpg', 'main/img/cake2.jpeg', 'main/img/cake3.png'];
        $photo_waffles = ['main/img/waffle1.jpg', 'main/img/waffle2.jpg', 'main/img/waffle3.jpg'];
        $photo_muffins = ['main/img/muffin1.jpg', 'main/img/muffin2.jpg', 'main/img/muffin3.jpg'];

        $random_category = rand(1, 3);
        $random_photo = null;
        $random_title = null;

        if ($random_category == 1) {
            $random_photo = fake()->randomElement($photo_cakes);
            $random_title = fake()->unique()->numerify('Торт-###');
        }
        else if ($random_category == 2) {
            $random_photo = fake()->randomElement($photo_waffles);
            $random_title = fake()->unique()->numerify('Вафля-###');
        }
        else if ($random_category == 3) {
            $random_photo = fake()->randomElement($photo_muffins);
            $random_title = fake()->unique()->numerify('Маффин-###');
        }

        return [
            'title'=> $random_title,
            'category_id' => $random_category,
            'size_id' => rand(1, 3),
            'expiration_date' => rand(24, 3000),
            'product_value' => fake()->sentence(),
            'description' =>  fake()->text(300),
            'ingredients' =>  fake()->text(400),
            'weight' => rand(300, 2000),
            'price' => fake()->randomFloat(3, 300, 10000) * 100,
//            'price' => rand(300, 10000),
            'photo' => $random_photo,
            'status' => fake()->randomElement(['active', 'inactive']),
        ];
    }
}
