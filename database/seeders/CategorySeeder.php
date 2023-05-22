<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'title'=> 'Торты',
                'slug'=> 'cakes',
                'photo'=> 'main/img/category-cakes-photo.png',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'title'=> 'Вафли',
                'slug'=> 'waffles',
                'photo'=> 'main/img/category-waffles-photo.png',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'title'=> 'Маффины, печенье',
                'slug'=> 'muffins',
                'photo'=> 'main/img/category-muffins-photo.png',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]);
    }
}
