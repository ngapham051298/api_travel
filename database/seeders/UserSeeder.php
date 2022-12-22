<?php

namespace Database\Seeders;

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
        DB::table('users')->truncate();
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'nga.pham+1@amela.vn',
                'password' => Hash::make('Amela@123'),
                'role_id' => 1,
            ],
            [
                'name' => 'Manager',
                'email' => 'nga.pham+2@amela.vn',
                'password' => Hash::make('Amela@123'),
                'role_id' => 2,
            ],
            [
                'name' => 'User',
                'email' => 'nga.pham+3@amela.vn',
                'password' => Hash::make('Amela@123'),
                'role_id' => 3,
            ],
            [
                'name' => 'Customer',
                'email' => 'nga.pham+4@amela.vn',
                'password' => Hash::make('Amela@123'),
                'role_id' => 4,
            ],
        ]);
    }
}
