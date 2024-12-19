<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('users')->where('role', 'customer')->get();
        // php artisan db:seed --class=OrderSeeder
        DB::table('orders')->insert([
            [
                'user_id' => '7eaff911-4aa0-42af-8d5c-1ffe5ee7956a',
                'package_id' => 1,
                'request' => 'Toko roti dengan tema kartun',
                'orientation' => 'portrait',
                'status' => 'pending',
                'price' => 120000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 'f8999e3a-802d-4d46-92c8-779ba19e8ffe',
                'package_id' => 2,
                'request' => 'Video Iklan Sampo Emeron',
                'orientation' => 'portrait',
                'status' => 'in progress',
                'price' => 50000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
