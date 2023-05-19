<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('banners')->insert([
            [
                'title'=> fake()->word(),
                'photo'=> 'main/img/slider_1.png',
                'description'=> 'Изумительные вкусняшки на любой вкус',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'title'=> fake()->word(),
                'photo'=> 'main/img/slider_2.png',
                'description'=> 'Наши вафли вас удивят!',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
        ]);
    }
}
