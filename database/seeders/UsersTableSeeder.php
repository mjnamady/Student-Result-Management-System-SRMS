<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            // Admin
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('111')
            ]
        ]);

        DB::table('students')->insert([
            // Admin
            [
                'name' => 'Student',
                'email' => 'student@gmail.com',
            ]
        ]);
    }
}
