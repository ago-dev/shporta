<?php

namespace Database\Seeders;

use App\Models\FoodServiceType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodServiceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('food_services')->delete();
        DB::table('food_service_types')->delete();


        FoodServiceType::create(array('name' => 'Full-Service Restaurant'));
        FoodServiceType::create(array('name' => 'Fast-Food'));
        FoodServiceType::create(array('name' => 'Cake Shop'));
    }
}
