<?php

namespace Database\Seeders;

use DB;
use Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin Sultan Farm',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
        ]);

        DB::table('users')->insert([
            'name' => 'Pemilik Sultan Farm',
            'email' => 'pemilik@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'pemilik',
        ]);
    }
}
