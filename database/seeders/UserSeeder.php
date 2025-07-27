<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('123456'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Receptionist User',
            'email' => 'reception@example.com',
            'password' => Hash::make('123456'),
            'role' => 'receptionist',
        ]);

        User::create([
            'name' => 'Doctor User',
            'email' => 'doctor@example.com',
            'password' => Hash::make('123456'),
            'role' => 'doctor',
        ]);
    }
}
