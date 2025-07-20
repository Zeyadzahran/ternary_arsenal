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
                'country_id' => 16,
                'price' => 1999.99,
                'stock' => 20,
                'image_url' => 'https://res.cloudinary.com/ddlxp23kv/image/upload/v1752264719/1_gtnjtd.png',
                'description' => 'Advanced infantry weapon with a surprisingly loud bark.',
            ],
            // [
            //     'name' => 'Panzer Pup',
            //     'model' => 'T-REX-3',
            //     'category_id' => 1,
            //     'country_id' => 16,
            //     'price' => 750000.00,
            //     'stock' => 5,
            //     'image_url' => 'https://res.cloudinary.com/ddlxp23kv/image/upload/v1752264720/6_h478qr.png',
            //     'description' => 'Heavy-duty tank with adorable intimidation factor.',
            // ],
            // [
            //     'name' => 'Boom Duck',
            //     'model' => 'QUA-155',
            //     'category_id' => 1,
            //     'country_id' => 16,
            //     'price' => 120000.00,
            //     'stock' => 8,
            //     'image_url' => 'https://res.cloudinary.com/ddlxp23kv/image/upload/v1752264732/10_lsvaup.png',
            //     'description' => 'Quack-powered artillery for serious splash damage.',
            // ],
            // [
            //     'name' => 'Hawk Jet',
            //     'model' => 'HJ-EAGLE1',
            //     'category_id' => 1,
            //     'country_id' => 16,
            //     'price' => 1800000.00,
            //     'stock' => 4,
            //     'image_url' => 'https://res.cloudinary.com/ddlxp23kv/image/upload/v1752269452/photo_2025-07-12_00-30-29_a4vpu7.jpg',
            //     'description' => 'Sky dominance with feathers and fire.',
            // ],
            // [
            //     'name' => 'Meow Mortar',
            //     'model' => 'CAT-88',
            //     'category_id' => 1,
            //     'country_id' => 17,
            //     'price' => 89999.99,
            //     'stock' => 10,
            //     'image_url' => 'https://res.cloudinary.com/ddlxp23kv/image/upload/v1752793591/Tumblr__Image_eqtgpq.jpg',
            //     'description' => 'Tactical artillery with precision and purring.',
            // ],
            // [
            //     'name' => 'Crocodile Cruiser',
            //     'model' => 'NAV-CROC-1',
            //     'category_id' => 1,
            //     'country_id' => 18,
            //     'price' => 999999.99,
            //     'stock' => 3,
            //     'image_url' => 'https://res.cloudinary.com/ddlxp23kv/image/upload/v1752793578/97946d85-6e73-4e43-8bfc-85b5a43d7b04_vvy8ar.jpg',
            //     'description' => 'Naval beast built for amphibious assault.',
            // ],
            // [
            //     'name' => 'Bat Bomber',
            //     'model' => 'BAT-WINGZ',
            //     'category_id' => 1,
            //     'country_id' => 20,
            //     'price' => 2750000.00,
            //     'stock' => 2,
            //     'image_url' => 'https://res.cloudinary.com/ddlxp23kv/image/upload/v1752793571/Exploring_the_Effective_Range_of_a__450_Bushmaster_btj2do.jpg',
            //     'description' => 'Silent nighttime bombardment straight from the caves.',
            // ],
           
             [
                'name' => 'Beretta M9',
                'model' => 'ICE-INF-7',
                'category_id' => 2,
                'country_id' => 16,
                'price' => 1500.00,
                'stock' => 17,
                'image_url' => 'https://res.cloudinary.com/ddlxp23kv/image/upload/v1752264717/2_t9u5ad.png',
                'description' => 'Designed for accuracy under pressure and fast recovery.',
            ],
             [
                'name' => 'Desert Eagle',
                'model' => 'ICE-INF-7',
                'category_id' => 2,
                'country_id' => 18,
                'price' => 1600.00,
                'stock' => 13,
                'image_url' => 'https://res.cloudinary.com/ddlxp23kv/image/upload/v1752412313/products/zbauz62lejtniiljtf5q.jpg',
                'description' => 'Elite tactical handgun for professionals in the field.',
            ],
                //  [
            //     'name' => 'Canik TP9 Elite',
            //     'model' => 'ICE-INF-7',
            //     'category_id' => 2,
            //     'country_id' => 16,
            //     'price' => 1700.00,
            //     'stock' => 11,
            //     'image_url' => 'https://res.cloudinary.com/ddlxp23kv/image/upload/v1752793705/f95bbf07-94fe-4095-9cfd-a80f203854b7_dlpnsn.jpg',
            //     'description' => 'Heavy-duty pistol with armor-piercing capability.',
            // ], [
            //     'name' => 'HK VP9',
            //     'model' => 'ICE-INF-7',
            //     'category_id' => 2,
            //     'country_id' => 16,
            //     'price' => 1800.00,
            //     'stock' => 10,
            //     'image_url' => 'https://res.cloudinary.com/ddlxp23kv/image/upload/v1752793704/9feb3441-48a7-48c7-a857-5e6bb4aeaca3_hslfnu.jpg',
            //     'description' => 'Compact size without sacrificing firepower.',
            // ],  [
            //     'name' => 'FNX-45 Tactical',
            //     'model' => 'ICE-INF-7',
            //     'category_id' => 2,
            //     'country_id' => 20,
            //     'price' => 2200.00,
            //     'stock' => 30,
            //     'image_url' => 'https://res.cloudinary.com/ddlxp23kv/image/upload/v1752793712/a7cdbfc2-a161-4c6f-b980-17622ea0c251_ct34xe.jpg',
            //     'description' => 'Trusted sidearm by law enforcement and military worldwide.',
            // ], [
            //     'name' => 'Taurus PT92',
            //     'model' => 'ICE-INF-7',
            //     'category_id' => 2,
            //     'country_id' => 18,
            //     'price' => 2400.00,
            //     'stock' => 26,
            //     'image_url' => 'https://res.cloudinary.com/ddlxp23kv/image/upload/v1752793730/f9e21178-df0c-49e8-b8f5-ab16e0c361e1_anonw2.jpg',
            //     'description' => 'Precision-engineered weapon with minimal recoil and smooth trigger.',
            // ], 
             [
                'name' => 'Walther P99',
                'model' => 'ICE-INF-7',
                'category_id' => 3,
                'country_id' => 16,
                'price' => 2800.00,
                'stock' => 20,
                'image_url' => 'https://res.cloudinary.com/ddlxp23kv/image/upload/v1752877023/products/ugsafolo2ptrss1gxf9p.jpg',
                'description' => 'Durable steel-frame pistol used by elite special forces.',
           ],
                //  [
            //     'name' => 'FN Five-seveN',
            //     'model' => 'ICE-INF-7',
            //     'category_id' => 3,
            //     'country_id' => 16,
            //     'price' => 2900.00,
            //     'stock' => 18,
            //     'image_url' => 'https://res.cloudinary.com/ddlxp23kv/image/upload/v1752793713/90031dab-95bf-4e6a-9acf-8b3cbcfee585_rcv8du.jpg',
            //     'description' => 'Classic revolver with timeless design and deadly accuracy.',
            // ], [
            //     'name' => 'Smith & Wesson M&P',
            //     'model' => 'ICE-INF-7',
            //     'category_id' => 3,
            //     'country_id' => 16,
            //     'price' => 3000.00,
            //     'stock' => 16,
            //     'image_url' => 'https://res.cloudinary.com/ddlxp23kv/image/upload/v1752793674/b4749950-cc7d-4f69-8aab-7044ba370432_hdv7q7.jpg',
            //     'description' => 'Tactical pistol with extended magazine and suppressor support.',
            // ],
             [
                'name' => 'Beretta Me',
                'model' => 'ICE-INF-7',
                'category_id' => 3,
                'country_id' => 18,
                'price' => 4100.00,
                'stock' => 10,
                'image_url' => 'https://res.cloudinary.com/ddlxp23kv/image/upload/v1752793606/Fire_catch_on_a_cannon_called__Whitworth__fvq81n.jpg',
                'description' => 'Compact and powerful handgun designed for close-range defense.',
            ],
                ['name' => 'Glock 19', 'model' => 'PlN-7', 'category_id' => 3, 'country_id' => 20, 'price' => 3950.00, 'stock' => 8, 'image_url' => 'https://res.cloudinary.com/ddlxp23kv/image/upload/v1752793600/Sunrise_at_Gettysburg_this_morning__husxcv.jpg', 'description' => 'Reliable and widely used pistol suitable for all environments.'],
                ['name' => 'SIG Sauer P226', 'model' => 'PlN-7', 'category_id' => 4, 'country_id' => 16, 'price' => 4600.00, 'stock' => 9, 'image_url' => 'https://res.cloudinary.com/ddlxp23kv/image/upload/v1752793680/aesthetic_wallpaper_soldier_v9c01d.jpg', 'description' => 'Preferred by military units for its reliability and control.'],
                ['name' => 'Heckler & Koch USP', 'model' => 'PlN-7', 'category_id' => 4, 'country_id' => 16, 'price' => 4700.00, 'stock' => 6, 'image_url' => 'https://res.cloudinary.com/ddlxp23kv/image/upload/v1752793684/download_12_oakj0k.jpg', 'description' => 'German-engineered pistol offering high accuracy and quality.'],
                ['name' => 'FN Five-seveN', 'model' => 'PlN-7', 'category_id' => 4, 'country_id' => 16, 'price' => 5300.00, 'stock' => 7, 'image_url' => 'https://res.cloudinary.com/ddlxp23kv/image/upload/v1752793675/203de890-6c2a-4148-8d9e-b4a00669acd1_hhdqod.jpg', 'description' => 'Lightweight pistol with armor-piercing capability.'],
                ['name' => 'CZ 75', 'model' => 'PlN-7', 'category_id' => 4, 'country_id' => 18, 'price' => 4100.00, 'stock' => 6, 'image_url' => 'https://res.cloudinary.com/ddlxp23kv/image/upload/v1752793656/e3f8250c-3832-443d-928d-990a4dc4075b_a9qu5f.jpg', 'description' => 'Czech-made pistol with excellent grip and recoil control.'],
                ['name' => 'Browning Hi-Power', 'model' => 'PlN-7', 'category_id' => 4, 'country_id' => 16, 'price' => 4400.00, 'stock' => 4, 'image_url' => 'https://res.cloudinary.com/ddlxp23kv/image/upload/v1752264732/8_sooai8.png', 'description' => 'Iconic 9mm pistol known for its high capacity.'],
                ['name' => 'Ruger SR9', 'model' => 'PlN-7', 'category_id' => 4, 'country_id' => 20, 'price' => 3750.00, 'stock' => 13, 'image_url' => 'https://res.cloudinary.com/ddlxp23kv/image/upload/v1752264717/4_jxpz2o.png', 'description' => 'Slim and lightweight pistol with modern safety features.'],
                ['name' => 'Taurus PT92', 'model' => 'PlN-7', 'category_id' => 5, 'country_id' => 16, 'price' => 3600.00, 'stock' => 10, 'image_url' => 'https://res.cloudinary.com/ddlxp23kv/image/upload/v1752264733/9_ex91dg.png', 'description' => 'Affordable and reliable Brazilian-manufactured handgun.'],
                ['name' => 'Remington 1911 R1', 'model' => 'PlN-7', 'category_id' => 5, 'country_id' => 16, 'price' => 4600.00, 'stock' => 5, 'image_url' => 'https://res.cloudinary.com/ddlxp23kv/image/upload/v1752792094/download_5_ah23um.jpg', 'description' => 'A modern take on the classic military sidearm.'],
                ['name' => 'Steyr M9-A1', 'model' => 'PlN-7', 'category_id' => 5, 'country_id' => 16, 'price' => 4300.00, 'stock' => 6, 'image_url' => 'https://res.cloudinary.com/ddlxp23kv/image/upload/v1752792095/download_3_w5fnsz.jpg', 'description' => 'Futuristic design with built-in safety and accuracy.'],
                ['name' => 'Canik TP9 Elite', 'model' => 'PlN-7', 'category_id' => 5, 'country_id' => 18, 'price' => 3850.00, 'stock' => 7, 'image_url' => 'https://res.cloudinary.com/ddlxp23kv/image/upload/v1752793731/download_10_gbfa4x.jpg', 'description' => 'Turkish-made pistol known for value and performance.'],

        ];



        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
