<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers = DB::table('users')->where('role', 'customer')->pluck('id')->toArray();

        if (count($customers) < 2) {
            Log::error('Seeder Error: Tidak cukup customer dengan role "customer" untuk membuat order.');
            return;
        }

        // Ambil package IDs
        $packages = DB::table('packages')->pluck('id')->toArray();

        if (count($packages) < 2) {
            Log::error('Seeder Error: Tidak cukup package untuk membuat order.');
            return;
        }

        $orders = [];

        for ($i = 0; $i < 50; $i++) {
            $statuses = ['pending', 'in progress', 'completed'];

            $orders[] = [
                'user_id' => $customers[array_rand($customers)],
                'package_id' => $packages[array_rand($packages)],
                'request' => 'Request untuk pesanan ke-' . ($i + 1),
                'orientation' => ['portrait', 'landscape'][array_rand(['portrait', 'landscape'])],
                'status' => $statuses[array_rand($statuses)],
                'price' => rand(50000, 200000),
                'created_at' => now()->subDays(rand(0, 30)),
                'updated_at' => now(),
            ];
        }

        DB::table('orders')->insert($orders);

        Log::info('Seeder Success: Berhasil menambahkan 50 data orders.');
    }
}