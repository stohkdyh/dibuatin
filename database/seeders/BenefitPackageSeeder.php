<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BenefitPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil semua package_id yang ada di tabel packages
        $packageIds = DB::table('packages')->pluck('id')->toArray();

        // Seeder untuk Benefit Packages
        $benefits = [
            'High Resolution',
            'Multiple Revisions',
            'Custom Design',
            'Priority Support',
            'Free Consultation',
            'Social Media Optimization',
            'Quick Delivery',
            'Marketing Tips',
            'Dedicated Project Manager',
            'Advanced Analytics Report',
            'Content Strategy Planning',
            'Video Editing',
        ];

        foreach ($packageIds as $packageId) {
            $selectedBenefits = array_rand(array_flip($benefits), rand(5, 8));

            if (!is_array($selectedBenefits)) {
                $selectedBenefits = [$selectedBenefits];
            }

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