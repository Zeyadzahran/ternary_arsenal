<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $countries = [
            ['name' => 'Germany', 'currency' => 'RM', 'team' => 'Axis'],
            ['name' => 'Italy', 'currency' => 'Lira', 'team' => 'Axis'],
            ['name' => 'Japan', 'currency' => 'Yen', 'team' => 'Axis'],
            ['name' => 'Hungary', 'currency' => 'Pengő', 'team' => 'Axis'],
            ['name' => 'Romania', 'currency' => 'Leu', 'team' => 'Axis'],
            ['name' => 'Bulgaria', 'currency' => 'Lev', 'team' => 'Axis'],

            ['name' => 'United Kingdom', 'currency' => '£', 'team' => 'Allies'],
            ['name' => 'USA', 'currency' => '$', 'team' => 'Allies'],
            ['name' => 'Soviet Union', 'currency' => '₽', 'team' => 'Allies'],
            ['name' => 'France', 'currency' => 'Franc', 'team' => 'Allies'],
            ['name' => 'China', 'currency' => 'Yuan', 'team' => 'Allies'],
            ['name' => 'Canada', 'currency' => 'CAD', 'team' => 'Allies'],
            ['name' => 'Australia', 'currency' => 'AUD', 'team' => 'Allies'],
            ['name' => 'New Zealand', 'currency' => 'NZD', 'team' => 'Allies'],
            ['name' => 'India', 'currency' => 'Rupee', 'team' => 'Allies'],

            ['name' => 'Switzerland', 'currency' => 'CHF', 'team' => 'Neutral'],
            ['name' => 'Sweden', 'currency' => 'SEK', 'team' => 'Neutral'],
            ['name' => 'Spain', 'currency' => 'Peseta', 'team' => 'Neutral'],
            ['name' => 'Portugal', 'currency' => 'Escudo', 'team' => 'Neutral'],
            ['name' => 'Turkey', 'currency' => 'Lira', 'team' => 'Neutral'],
        ];

        foreach ($countries as $country) {
            Country::create($country);
        }
    }
}