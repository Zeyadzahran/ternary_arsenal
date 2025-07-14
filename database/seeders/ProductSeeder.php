<?php

namespace Database\Seeders;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
    {
        $products = [
            [
                'name' => 'Howling Blaster',
                'model' => 'HB-99',
                'category_id' => 1,
                'country_id' => 1,
                'price' => 1999.99,
                'stock' => 20,
                'image_public_id' => '7_hiuwgj',
                'description' => 'Advanced infantry weapon with a surprisingly loud bark.',
            ],
            [
                'name' => 'Panzer Pup',
                'model' => 'T-REX-3',
                'category_id' => 2,
                'country_id' => 2,
                'price' => 750000.00,
                'stock' => 5,
                'image_public_id' => 'Goat_Riding_a_Plane_algao4',
                'description' => 'Heavy-duty tank with adorable intimidation factor.',
            ],
            [
                'name' => 'Boom Duck',
                'model' => 'QUA-155',
                'category_id' => 3,
                'country_id' => 3,
                'price' => 120000.00,
                'stock' => 8,
                'image_public_id' => '10_lsvaup',
                'description' => 'Quack-powered artillery for serious splash damage.',
            ],
            [
                'name' => 'Sealion Sub',
                'model' => 'SS-SEA9',
                'category_id' => 4,
                'country_id' => 4,
                'price' => 2200000.00,
                'stock' => 2,
                'image_public_id' => '6_h478qr',
                'description' => 'Stealthy and slippery naval force for covert missions.',
            ],
            [
                'name' => 'Hawk Jet',
                'model' => 'HJ-EAGLE1',
                'category_id' => 5,
                'country_id' => 5,
                'price' => 1800000.00,
                'stock' => 4,
                'image_public_id' => '1_gtnjtd',
                'description' => 'Sky dominance with feathers and fire.',
            ],
            [
                'name' => 'Flamethrower Ferret',
                'model' => 'FF-14',
                'category_id' => 1,
                'country_id' => 1,
                'price' => 3499.99,
                'stock' => 15,
                'image_public_id' => '5_urftpp',
                'description' => 'Small but spicy assault weapon for tight situations.',
            ],
            [
                'name' => 'Meow Mortar',
                'model' => 'CAT-88',
                'category_id' => 3,
                'country_id' => 2,
                'price' => 89999.99,
                'stock' => 10,
                'image_public_id' => '3_xhjabw',
                'description' => 'Tactical artillery with precision and purring.',
            ],
            [
                'name' => 'Crocodile Cruiser',
                'model' => 'NAV-CROC-1',
                'category_id' => 4,
                'country_id' => 3,
                'price' => 999999.99,
                'stock' => 3,
                'image_public_id' => '4_jxpz2o',
                'description' => 'Naval beast built for amphibious assault.',
            ],
            [
                'name' => 'Bat Bomber',
                'model' => 'BAT-WINGZ',
                'category_id' => 5,
                'country_id' => 4,
                'price' => 2750000.00,
                'stock' => 2,
                'image_public_id' => 'photo_2025-07-12_00-30-29_a4vpu7',
                'description' => 'Silent nighttime bombardment straight from the caves.',
            ],
            [
                'name' => 'Penguin Patrol',
                'model' => 'ICE-INF-7',
                'category_id' => 1,
                'country_id' => 5,
                'price' => 1300.00,
                'stock' => 50,
                'image_public_id' => 'photo_2025-07-12_00-30-39_wtv0eb',
                'description' => 'Cold-weather infantry ready to waddle into war.',
            ],
        ];



        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
