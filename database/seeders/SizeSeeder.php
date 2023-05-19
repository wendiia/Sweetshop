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
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=> 'средний',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=> 'большой',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]);
    }
}