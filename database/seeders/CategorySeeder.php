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
                'title'=> 'торты',
                'slug'=> 'cakes',
                'photo'=> 'main/img/banner-all.png',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'title'=> 'вафли',
                'slug'=> 'waffles',
                'photo'=> 'main/img/banner-all.png',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'title'=> 'маффины, печенье',
                'slug'=> 'muffins',
                'photo'=> 'main/img/banner-all.png',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]);
    }
}
