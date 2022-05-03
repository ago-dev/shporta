<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodServiceType extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('food_service_type')->delete();

        FoodServiceType::create(array('name' => 'Full-Service Restaurant'));
        FoodServiceType::create(array('name' => 'Fast-Food'));
        FoodServiceType::create(array('name' => 'Cake Shop'));
    }
}
