<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('products')->insert([
            [
                'title'=> fake()->name(),
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'title'=> fake()->name(),
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'title'=> fake()->name(),
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]);
    }
}
