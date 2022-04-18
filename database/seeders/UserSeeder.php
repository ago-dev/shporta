<?php

namespace Database\Seeders;

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

        $users = [
            ['John', 'Doe'], 
            ['Billy', 'Withers'], 
            ['Jack', 'Smith'],
            ['Michael', 'Gira'],
            ['Debbie', 'Harry'],
            ['Steven', 'Richards'],
            ['Laura', 'Spears']
        ];

        foreach ($users as $user) {
            $first_name = $user[0];
            $last_name = $user[1];
            $username = strtolower($first_name.$last_name);
            User::create(array(
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $username.'@gmail.com',
                'username' => $username,
                'password' => Hash::make($username),
                'date_created' => now(),
                'email_verified_at' => now(),
                'role_id' => '1',
                'is_active' => true)
            );
        }
    }
}
