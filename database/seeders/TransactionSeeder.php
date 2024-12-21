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
        $orders = DB::table('orders')
            ->where('status', 'completed')
            ->get();

        if ($orders->isEmpty()) {
            Log::error('Seeder Error: Tidak ada orders yang dapat digunakan untuk transaksi.');
            return;
        }

        $transactions = [];

        foreach ($orders as $order) {
            $paymentMethods = [
                'bank_transfer',
                'ewallet',
                'credit_card',
                'debit_card',
                'virtual_account',
                'qris',
                'paypal'
            ];
            $paymentStatuses = ['paid', 'unpaid', 'refunded'];

            $paymentMethod = $paymentMethods[array_rand($paymentMethods)];
            $paymentStatus = $paymentStatuses[array_rand($paymentStatuses)];

            $orderCreatedAt = \Carbon\Carbon::parse($order->created_at);
            $createdAt = $orderCreatedAt->addDays(rand(1, 10))->addHours(rand(0, 23))->addMinutes(rand(0, 59));

            $transactions[] = [
                'id' => (string) Str::uuid(),
                'order_id' => $order->id,
                'user_id' => $order->user_id,
                'grandtotal' => $order->price,
                'payment_method' => $paymentMethod,
                'payment_status' => $paymentStatus,
                'created_at' => $createdAt,
                'updated_at' => $createdAt,
            ];
        }

        DB::table('transactions')->insert($transactions);

        Log::info('Seeder Success: Transactions berhasil di-generate.');
    }
}