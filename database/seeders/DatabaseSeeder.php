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
        $this->call(UserSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(PackageSeeder::class);
        $this->call(BenefitPackageSeeder::class);
        // $this->call(OrderSeeder::class);
        // $this->call(TransactionSeeder::class);
    }
}