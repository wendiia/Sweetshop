<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;


use App\Models\Product;
use App\Models\SpecialIngredient;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(SizeSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(BannerSeeder::class);

        User::factory(50)->create();

        SpecialIngredient::factory(30)->create();

        Product::factory(50)->create();
        foreach (Product::all() as $product) {
            $special_ingredients = SpecialIngredient::inRandomOrder()->take(rand(1, 6))->pluck('id');
            $product->special_ingredients()->attach($special_ingredients);
        }

        Cart::factory(50)->create();
        foreach (Cart::all() as $cart) {
            $products = Product::inRandomOrder()->take(rand(1, 10))->pluck('id');
            $pivot_data =[];
            foreach ($products as $product) {
                $pivot_data[$product] = ['quantity' => rand(1, 20)];
            }
            $cart->products()->attach($pivot_data);
        }

        Order::factory(25)->create();
        foreach (Order::all() as $order) {
            $products = Product::inRandomOrder()->take(rand(1, 10))->pluck('id');
            $pivot_data =[];
            foreach ($products as $product) {
                $pivot_data[$product] = ['quantity' => rand(1, 20), 'price' => rand(300, 10000), 'amount' => rand(300, 100000)];
            }
            $order->products()->attach($pivot_data);
        }
    }
}
//       ****************************
// \App\Models\User::factory()->create([
//     'name' => 'Test User',
//     'email' => 'test@example.com',
// ]);
