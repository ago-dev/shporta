<?php

namespace Database\Seeders;

use App\Models\EmployeeType;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        EmployeeType::create(array('id' => 1, 'name' => 'Administrator'));
        EmployeeType::create(array('id' => 2, 'name' => 'Customer Support'));
    }
}
