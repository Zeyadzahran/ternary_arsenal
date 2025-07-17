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


            ['name' => 'Adolf Hitler', 'email' => 'hitler@germany.com', 'password' => Hash::make('12345678'), 'country_id' => 1, 'role' => 'admin'],
            ['name' => 'Benito Mussolini', 'email' => 'mussolini@italy.com', 'password' => Hash::make('12345678'), 'country_id' => 2, 'role' => 'admin'],
            ['name' => 'Hirohito', 'email' => 'hirohito@japan.com', 'password' => Hash::make('12345678'), 'country_id' => 3, 'role' => 'admin'],
            ['name' => 'Miklós Horthy', 'email' => 'horthy@hungary.com', 'password' => Hash::make('12345678'), 'country_id' => 4, 'role' => 'admin'],
            ['name' => 'Ion Antonescu', 'email' => 'antonescu@romania.com', 'password' => Hash::make('12345678'), 'country_id' => 5, 'role' => 'admin'],
            ['name' => 'Tsar Boris III', 'email' => 'boris@bulgaria.com', 'password' => Hash::make('12345678'), 'country_id' => 6, 'role' => 'admin'],

            ['name' => 'Winston Churchill', 'email' => 'churchill@uk.com', 'password' => Hash::make('12345678'), 'country_id' => 7, 'role' => 'admin'],
            ['name' => 'Franklin D. Roosevelt', 'email' => 'roosevelt@usa.com', 'password' => Hash::make('12345678'), 'country_id' => 8, 'role' => 'admin'],
            ['name' => 'Joseph Stalin', 'email' => 'stalin@ussr.com', 'password' => Hash::make('12345678'), 'country_id' => 9, 'role' => 'admin'],
            ['name' => 'Charles de Gaulle', 'email' => 'degaulle@france.com', 'password' => Hash::make('12345678'), 'country_id' => 10, 'role' => 'admin'],
            ['name' => 'Chiang Kai-shek', 'email' => 'chiang@china.com', 'password' => Hash::make('12345678'), 'country_id' => 11, 'role' => 'admin'],
            ['name' => 'William Lyon Mackenzie King', 'email' => 'king@canada.com', 'password' => Hash::make('12345678'), 'country_id' => 12, 'role' => 'admin'],
            ['name' => 'John Curtin', 'email' => 'curtin@australia.com', 'password' => Hash::make('12345678'), 'country_id' => 13, 'role' => 'admin'],
            ['name' => 'Peter Fraser', 'email' => 'fraser@nz.com', 'password' => Hash::make('12345678'), 'country_id' => 14, 'role' => 'admin'],
            ['name' => 'Mahatma Gandhi', 'email' => 'gandhi@india.com', 'password' => Hash::make('12345678'), 'country_id' => 15, 'role' => 'admin'],

            ['name' => 'Henri Guisan', 'email' => 'guisan@switzerland.com', 'password' => Hash::make('12345678'), 'country_id' => 16, 'role' => 'admin'],
            ['name' => 'Per Albin Hansson', 'email' => 'hansson@sweden.com', 'password' => Hash::make('12345678'), 'country_id' => 17, 'role' => 'admin'],
            ['name' => 'Francisco Franco', 'email' => 'franco@spain.com', 'password' => Hash::make('12345678'), 'country_id' => 18, 'role' => 'admin'],
            ['name' => 'António de Oliveira Salazar', 'email' => 'salazar@portugal.com', 'password' => Hash::make('12345678'), 'country_id' => 19, 'role' => 'admin'],
            ['name' => 'İsmet İnönü', 'email' => 'inonu@turkey.com', 'password' => Hash::make('12345678'), 'country_id' => 20, 'role' => 'admin'],
            ['name' => 'Herr Erwin Rommel', 'email' => 'herr@switzerland.com', 'password' => Hash::make('12345678'), 'country_id' => 16, 'role' => 'ruler'],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
