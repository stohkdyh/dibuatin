<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageAndBenefitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data Product IDs yang ada di database
        $productIds = [1, 2]; // Pastikan produk ini sudah ada di tabel `products`

        // Seeder untuk Packages
        $packages = [
            [
                'name' => 'Paket Premium Promo',
                'product_id' => $productIds[array_rand($productIds)],
                'detail_package' => 'Paket terbaik dengan berbagai keunggulan untuk promosi akhir tahun.',
                'price' => 120000,
                'working_time' => 3,
                'unit' => 'days',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Paket Ekonomis',
                'product_id' => $productIds[array_rand($productIds)],
                'detail_package' => 'Paket hemat untuk usaha kecil menengah yang ingin mencoba iklan.',
                'price' => 50000,
                'working_time' => 24,
                'unit' => 'hours',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Paket Standard',
                'product_id' => $productIds[array_rand($productIds)],
                'detail_package' => 'Paket standar untuk keperluan iklan sederhana.',
                'price' => 75000,
                'working_time' => 7,
                'unit' => 'days',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert data ke tabel packages
        foreach ($packages as $package) {
            $packageId = DB::table('packages')->insertGetId($package);

            // Seeder untuk Benefit Packages (7-8 per package)
            $benefits = [
                'High Resolution',
                'Multiple Revisions',
                'Custom Design',
                'Priority Support',
                'Free Consultation',
                'Social Media Optimization',
                'Quick Delivery',
                'Marketing Tips',
            ];

            $selectedBenefits = array_rand(array_flip($benefits), 7); // Ambil 7 random benefits

            foreach ($selectedBenefits as $benefit) {
                DB::table('benefit_packages')->insert([
                    'packages_id' => $packageId,
                    'benefit' => $benefit,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
