<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categories = [
            ['name' => 'Infantry Weapons'],
            ['name' => 'Tanks'],
            ['name' => 'Artillery'],
            ['name' => 'Naval Forces'],
            ['name' => 'Planes'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
