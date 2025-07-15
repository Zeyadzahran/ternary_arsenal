<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Regular User',
                'email' => 'user@user.com',
                'password' => Hash::make('12345678'),
                'country_id' => 1,
                'role' => 'general',
            ],
            [
                'name' => 'Admin Officer',
                'email' => 'admin@admin.com',
                'password' => Hash::make('12345678'),
                'country_id' => 2,
                'role' => 'admin',
            ],
            [
                'name' => 'Ruler Supreme',
                'email' => 'ruler@ruler.com',
                'password' => Hash::make('12345678'),
                'country_id' => 3,
                'role' => 'ruler',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
