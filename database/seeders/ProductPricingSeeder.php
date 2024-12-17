<?php

namespace Database\Seeders;

use App\Models\ProductPricing;
use Illuminate\Database\Seeder;

class ProductPricingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pricing for Banner (Width) - 5
        ProductPricing::create([
            'product_type_id' => 1,  // Assuming 1 is the ID of 'Banner'
            'attribute_name' => '5',
            'min_value' => 50,
            'max_value' => 100,
            'difficulty_level' => 'easy',
            'base_price' => 17000
        ]);

        ProductPricing::create([
            'product_type_id' => 1,
            'attribute_name' => '5',
            'min_value' => 101,
            'max_value' => 150,
            'difficulty_level' => 'medium',
            'base_price' => 22000
        ]);

        ProductPricing::create([
            'product_type_id' => 1,
            'attribute_name' => '5',
            'min_value' => 151,
            'max_value' => 200,
            'difficulty_level' => 'hard',
            'base_price' => 27000
        ]);

        // Pricing for Banner (Height) - 6
        ProductPricing::create([
            'product_type_id' => 1,
            'attribute_name' => '6',
            'min_value' => 50,
            'max_value' => 100,
            'difficulty_level' => 'easy',
            'base_price' => 16000
        ]);

        ProductPricing::create([
            'product_type_id' => 1,
            'attribute_name' => '6',
            'min_value' => 101,
            'max_value' => 150,
            'difficulty_level' => 'medium',
            'base_price' => 21000
        ]);

        ProductPricing::create([
            'product_type_id' => 1,
            'attribute_name' => '6',
            'min_value' => 151,
            'max_value' => 200,
            'difficulty_level' => 'hard',
            'base_price' => 26000
        ]);

        // Pricing for Poster (Width) - 3
        ProductPricing::create([
            'product_type_id' => 2,
            'attribute_name' => '3',
            'min_value' => 300,
            'max_value' => 500,
            'difficulty_level' => 'easy',
            'base_price' => 18000
        ]);

        ProductPricing::create([
            'product_type_id' => 2,
            'attribute_name' => '3',
            'min_value' => 501,
            'max_value' => 700,
            'difficulty_level' => 'medium',
            'base_price' => 23000
        ]);

        ProductPricing::create([
            'product_type_id' => 2,
            'attribute_name' => '3',
            'min_value' => 701,
            'max_value' => 900,
            'difficulty_level' => 'hard',
            'base_price' => 28000
        ]);

        // Pricing for Poster (Height) - 4
        ProductPricing::create([
            'product_type_id' => 2,
            'attribute_name' => '4',
            'min_value' => 300,
            'max_value' => 500,
            'difficulty_level' => 'easy',
            'base_price' => 17000
        ]);

        ProductPricing::create([
            'product_type_id' => 2,
            'attribute_name' => '4',
            'min_value' => 501,
            'max_value' => 700,
            'difficulty_level' => 'medium',
            'base_price' => 22000
        ]);

        ProductPricing::create([
            'product_type_id' => 2,
            'attribute_name' => '4',
            'min_value' => 701,
            'max_value' => 900,
            'difficulty_level' => 'hard',
            'base_price' => 27000
        ]);

        // Pricing for Short Video (Resolution) - 1
        ProductPricing::create([
            'product_type_id' => 3,
            'attribute_name' => '1',
            'min_value' => 720,
            'max_value' => 1080,
            'difficulty_level' => 'easy',
            'base_price' => 160000
        ]);

        ProductPricing::create([
            'product_type_id' => 3,
            'attribute_name' => '1',
            'min_value' => 1081,
            'max_value' => 1440,
            'difficulty_level' => 'medium',
            'base_price' => 230000
        ]);

        ProductPricing::create([
            'product_type_id' => 3,
            'attribute_name' => '1',
            'min_value' => 1441,
            'max_value' => 2160,
            'difficulty_level' => 'hard',
            'base_price' => 300000
        ]);

        // Pricing for Short Video (Duration) - 2
        ProductPricing::create([
            'product_type_id' => 3,
            'attribute_name' => '2',
            'min_value' => 10,
            'max_value' => 30,
            'difficulty_level' => 'easy',
            'base_price' => 150000
        ]);

        ProductPricing::create([
            'product_type_id' => 3,
            'attribute_name' => '2',
            'min_value' => 31,
            'max_value' => 60,
            'difficulty_level' => 'medium',
            'base_price' => 220000
        ]);

        ProductPricing::create([
            'product_type_id' => 3,
            'attribute_name' => '2',
            'min_value' => 61,
            'max_value' => 90,
            'difficulty_level' => 'hard',
            'base_price' => 290000
        ]);
    }
}