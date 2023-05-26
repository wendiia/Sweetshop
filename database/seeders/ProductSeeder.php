<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\SpecialIngredient;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory(100)->create();

        foreach (Product::all() as $product) {
            $special_ingredients = SpecialIngredient::inRandomOrder()->take(rand(1, 6))->pluck('id');
            $product->special_ingredients()->attach($special_ingredients);
        }
    }
}
