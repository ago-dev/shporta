<?php

namespace Database\Seeders;

use App\Enum\EmployeeRoleEnum;
use App\Models\Employee;
use App\Models\EmployeeType;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->delete();

        Employee::create([
            'user_id' => User::where('email', 'admin@gmail.com')->first()->id,
            'employee_type_id' => EmployeeType::getTypeByName(EmployeeRoleEnum::ADMINISTRATOR)->id
        ]);


        Employee::create([
            'user_id' => User::where('email', 'employee@gmail.com')->first()->id,
            'employee_type_id' => EmployeeType::getTypeByName(EmployeeRoleEnum::CUSTOMER_SUPPORT)->id
        ]);
    }
}
