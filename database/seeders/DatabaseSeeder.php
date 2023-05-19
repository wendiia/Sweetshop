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
//        $this->call(UsersTableSeeder::class);

//
        $this->call(SizeSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(BannerSeeder::class);

        User::factory(50)->create();
        Cart::factory(50)->create();
        SpecialIngredient::factory(10)->create();
        Order::factory(25)->create();

//        foreach (Order::all() as $order) {
//            $products = Product::inRandomOrder()->take(rand(1, 3))->pluck('id');
//            $order->products()->attach($products);
//        }

//       ****************************
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
