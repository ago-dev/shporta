<?php

namespace Database\Seeders;

use App\Models\FoodCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('food_categories')->delete();

        FoodCategory::create(array('name' => 'Pizza'));
        FoodCategory::create(array('name' => 'Fast Food'));
        FoodCategory::create(array('name' => 'Sea Food'));
        FoodCategory::create(array('name' => 'Antipasta'));
        FoodCategory::create(array('name' => 'Pasta'));
        FoodCategory::create(array('name' => 'Embelsira'));
        FoodCategory::create(array('name' => 'Akullore'));
        FoodCategory::create(array('name' => 'Pije Freskuese'));
        FoodCategory::create(array('name' => 'Pije Alkoolike'));
        FoodCategory::create(array('name' => 'Torta'));
        FoodCategory::create(array('name' => 'Supa'));
        FoodCategory::create(array('name' => 'Sallate'));
    }
}
