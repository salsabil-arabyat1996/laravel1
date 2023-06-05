<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRoleId = DB::table('roles')->where('permission', 'admin')->value('id');

        DB::table('users')->insert([
            'fname' => 'Admin',
            'lname' => 'User',
            'img' => 'admin.jpg',
            'email' => 'admin@example.com',
            'phone' => 1234567890,
            'password' => Hash::make('password123'),
            'role_id' => $adminRoleId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
    
}
