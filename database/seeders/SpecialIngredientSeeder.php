<?php

namespace Database\Seeders;

use App\Models\SpecialIngredient;
use Illuminate\Database\Seeder;

class SpecialIngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SpecialIngredient::factory(30)->create();
    }
}
