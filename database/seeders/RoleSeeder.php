<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!User::all()->isEmpty())
            DB::table('users')->delete();
            
        DB::table('roles')->delete();

        Role::create(array('id' => 1, 'name' => 'Employee'));
        Role::create(array('id' => 2, 'name' => 'Customer'));
    }
}
