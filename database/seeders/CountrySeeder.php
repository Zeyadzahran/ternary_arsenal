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
            ['name' => 'Germany', 'currency' => 'EUR', 'team' => 'Axis'],
            ['name' => 'Italy', 'currency' => 'EUR', 'team' => 'Axis'],
            ['name' => 'Japan', 'currency' => 'JPY', 'team' => 'Axis'],
            ['name' => 'Hungary', 'currency' => 'HUF', 'team' => 'Axis'],
            ['name' => 'Romania', 'currency' => 'RON', 'team' => 'Axis'],
            ['name' => 'Bulgaria', 'currency' => 'BGN', 'team' => 'Axis'],

            ['name' => 'United Kingdom', 'currency' => 'GBP', 'team' => 'Allies'],
            ['name' => 'USA', 'currency' => 'USD', 'team' => 'Allies'],
            ['name' => 'Soviet Union', 'currency' => 'RUB', 'team' => 'Allies'],
            ['name' => 'France', 'currency' => 'EUR', 'team' => 'Allies'],
            ['name' => 'China', 'currency' => 'CNY', 'team' => 'Allies'],
            ['name' => 'Canada', 'currency' => 'CAD', 'team' => 'Allies'],
            ['name' => 'Australia', 'currency' => 'AUD', 'team' => 'Allies'],
            ['name' => 'New Zealand', 'currency' => 'NZD', 'team' => 'Allies'],
            ['name' => 'India', 'currency' => 'INR', 'team' => 'Allies'],

            ['name' => 'Switzerland', 'currency' => 'CHF', 'team' => 'Neutral'],
            ['name' => 'Sweden', 'currency' => 'SEK', 'team' => 'Neutral'],
            ['name' => 'Spain', 'currency' => 'EUR', 'team' => 'Neutral'],
            ['name' => 'Portugal', 'currency' => 'EUR', 'team' => 'Neutral'],
            ['name' => 'Turkey', 'currency' => 'TRY', 'team' => 'Neutral'],
        ];

        foreach ($countries as $country) {
            Country::create($country);
        }
    }
}