<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sizes')->insert([
            [
                'name'=> 'маленький',
                'order'=> 1,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=> 'средний',
                'order'=> 2,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=> 'большой',
                'order'=> 3,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]);
    }
}
