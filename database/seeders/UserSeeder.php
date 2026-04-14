<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Sample student/farmer
        DB::table('users')->insert([
            'name' => 'Farmer Student',
            'email' => 'student@example.com',
            'password' => Hash::make('student123'),
            'role' => 'student',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
