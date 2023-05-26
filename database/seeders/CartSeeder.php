<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cart::factory(50)->create();

        foreach (Cart::all() as $cart) {
            $products = Product::inRandomOrder()->take(rand(1, 10))->pluck('id');
            $pivot_data =[];
            foreach ($products as $product) {
                $pivot_data[$product] = ['quantity' => rand(1, 20)];
            }
            $cart->products()->attach($pivot_data);
        }
    }
}
