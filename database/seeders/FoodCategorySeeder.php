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

        FoodCategory::create(array('name' => 'Fat', 'healthy_rate' => 34));
        FoodCategory::create(array('name' => 'Protein', 'healthy_rate' => 88));
        FoodCategory::create(array('name' => 'Dairy', 'healthy_rate' => 52));
    }
}
