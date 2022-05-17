<?php

namespace Database\Seeders;

use App\Enum\UserRoleEnum;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        User::create(array(
                'first_name' => 'Admin',
                'last_name' => 'Admin',
                'email' => 'admin@gmail.com',
                'username' => 'admin',
                'password' => Hash::make('admin'),
                'date_created' => now(),
                'email_verified_at' => now(),
                'role_id' => Role::getRoleByName(UserRoleEnum::EMPLOYEE->value)->id,
                'is_active' => true,
                'image' => 'no-pic.jpg')
        );

        User::create(array(
                'first_name' => 'Employee',
                'last_name' => 'Employee',
                'email' => 'employee@gmail.com',
                'username' => 'employee',
                'password' => Hash::make('employee'),
                'date_created' => now(),
                'email_verified_at' => now(),
                'role_id' => Role::getRoleByName(UserRoleEnum::EMPLOYEE->value)->id,
                'is_active' => true,
                'image' => 'no-pic.jpg')
        );

        User::create(array(
                'first_name' => 'Customer',
                'last_name' => 'Customer',
                'email' => 'customer@gmail.com',
                'username' => 'customer',
                'password' => Hash::make('customer'),
                'date_created' => now(),
                'email_verified_at' => now(),
                'role_id' => Role::getRoleByName(UserRoleEnum::CUSTOMER->value)->id,
                'is_active' => true,
                'image' => 'no-pic.jpg')
        );

    }
}
