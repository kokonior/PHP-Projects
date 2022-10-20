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
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@asgard.com',
                'password' => Hash::make('admin'),
                'role' => 'admin',
            ],
            [
                'name' => 'resepsionis',
                'email' => 'resepsionis@asgard.com',
                'password' => Hash::make('resepsionis'),
                'role' => 'resepsionis',
            ],
            [
                'name' => 'user',
                'email' => 'user@asgard.com',
                'password' => Hash::make('user'),
                'role' => 'user',
            ],
        ]);
    }
}
