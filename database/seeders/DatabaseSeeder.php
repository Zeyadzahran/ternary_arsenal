<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        //     'country_id' => 1,
        // ]);


        $this->call([
            UserSeeder::class,
            CountrySeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
        ]);

        \App\Models\Product::factory()->count(50)->create();
    }

}
