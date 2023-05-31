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
                'title'=> 'Большой выбор',
                'photo'=> 'main/img/slider_1.png',
                'description'=> 'Изумительные вкусняшки на любой вкус',
                'discount' => 'В день вашего рождения 15% на блинчики',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'title'=> 'Низкие цены',
                'photo'=> 'main/img/slider_2.png',
                'description'=> 'Наши вафли вас удивят!',
                'discount' => '20% на первый заказ',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
        ]);
    }
}
