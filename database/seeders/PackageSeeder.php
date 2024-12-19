<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $packages = [];

        $package_name = 'Paket ' . Str::random(5);

        for ($i = 1; $i <= 50; $i++) {
            $packages[] = [
                'name' => $package_name . ' ' . $i,
                'product_id' => rand(1, 2),
                'detail_package' => 'Detail dari Paket ' . $package_name . ' ' . $i . ', yang menawarkan keunggulan berbeda-beda.',
                'price' => rand(30000, 150000),
                'working_time' => rand(1, 10),
                'unit' => ['days', 'hours'][array_rand(['days', 'hours'])],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        Package::insert($packages);
    }
}