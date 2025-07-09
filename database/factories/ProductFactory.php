<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word(),
            'model' => $this->faker->unique()->bothify('Model-###'),
            'category_id' => \App\Models\Category::inRandomOrder()->first()->id ?? 1,
            'country_id' => \App\Models\Country::inRandomOrder()->first()->id ?? 1,
            'price' => $this->faker->randomFloat(2, 100, 1000),
            'stock' => $this->faker->numberBetween(0, 100),
            'path' => $this->faker->imageUrl(640, 480, 'products', true),
        ];
    }       
}


