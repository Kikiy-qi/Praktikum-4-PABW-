<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@parktrack.com'],
            [
                'name' => 'Admin Petugas',
                'password' => Hash::make('password'),
                'role' => 'officer',
                'phone' => '081234567890',
            ]
        );

        User::updateOrCreate(
            ['email' => 'user@gmail.com'],
            [
                'name' => 'User Test',
                'password' => Hash::make('password'),
                'role' => 'user',
                'phone' => '089876543210',
            ]
        );
    }
}
