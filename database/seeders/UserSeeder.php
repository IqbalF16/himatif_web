<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
        	'name' => 'admin1',
        	'email' => '01lululili01@gmail.com',
        	'password' => bcrypt('12345678')
        ]);

        $admin->assignRole('admin');

        $user = User::create([
        	'name' => 'user1',
        	'email' => '02lululili02@gmail.com',
        	'password' => bcrypt('12345678')
        ]);

        $user->assignRole('user');
    }
}
