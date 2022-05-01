<?php

namespace Database\Seeders;

use App\Models\EmployeeType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employee_types')->delete();

        EmployeeType::create(array('name' => 'Administrator'));
        EmployeeType::create(array('name' => 'Customer Support'));
    }
}
