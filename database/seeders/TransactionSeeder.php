<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil semua order yang statusnya 'completed'
        $orders = DB::table('orders')
            ->where('status', 'completed')
            ->get();

        if ($orders->isEmpty()) {
            Log::error('Seeder Error: Tidak ada orders yang dapat digunakan untuk transaksi.');
            return;
        }

        $transactions = [];

        foreach ($orders as $order) {
            $paymentDate = now()->subDays(rand(1, 30));

            $transactions[] = [
                'id' => (string) Str::uuid(),
                'order_id' => $order->id,
                'user_id' => $order->user_id,
                'grandtotal' => $order->price,
                'payment_method' => 'credit_card',
                'payment_status' => 'unpaid',
                'payment_date' => $paymentDate,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('transactions')->insert($transactions);

        Log::info('Seeder Success: Transactions berhasil di-generate.');
    }
}