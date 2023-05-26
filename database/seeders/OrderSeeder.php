<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::factory(25)->create();

        foreach (Order::all() as $order) {
            $products = Product::inRandomOrder()->take(rand(1, 10))->pluck('id');
            $pivot_data = [];
            foreach ($products as $product) {
                $pivot_data[$product] = ['quantity' => rand(1, 20), 'price' => rand(300, 10000), 'amount' => rand(300, 100000)];
            }
            $order->products()->attach($pivot_data);
        }
    }
}
