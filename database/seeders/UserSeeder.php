<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Country;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
    //     $leaders = [
    //         'Germany' => 'Adolf Hitler',
    //         'Italy' => 'Benito Mussolini',
    //         'Japan' => 'Hideki Tojo',
    //         'Hungary' => 'Miklós Horthy',
    //         'Romania' => 'Ion Antonescu',
    //         'Bulgaria' => 'Boris III',

    //         'United Kingdom' => 'Winston Churchill',
    //         'USA' => 'Franklin D. Roosevelt',
    //         'Soviet Union' => 'Joseph Stalin',
    //         'France' => 'Charles de Gaulle',
    //         'China' => 'Chiang Kai-shek',
    //         'Canada' => 'William Lyon Mackenzie King',
    //         'Australia' => 'John Curtin',
    //         'New Zealand' => 'Peter Fraser',
    //         'India' => 'Chakravarti Rajagopalachari',

    //         'Switzerland' => 'Marcel Pilet-Golaz',
    //         'Sweden' => 'Per Albin Hansson',
    //         'Spain' => 'Francisco Franco',
    //         'Portugal' => 'António de Oliveira Salazar',
    //         'Turkey' => 'İsmet İnönü',
    //     ];

    //     foreach ($leaders as $countryName => $leaderName) {
    //         $country = Country::where('name', $countryName)->first();

    //         if ($country) {
    //             User::create([
    //                 'name' => $leaderName,
    //                 'email' => strtolower(str_replace(' ', '.', $leaderName)) . '@' . strtolower(str_replace(' ', '', $countryName)) . '.com',
    //                 'password' => Hash::make('password'),
    //                 'country_id' => $country->id,
    //                 'role' => 'admin',
    //             ]);
    //         }
    //     }
     }
}
