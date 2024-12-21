<?php

namespace App\Filament\Widgets;

use Illuminate\Support\Facades\DB;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class TransactionWidgets extends BaseWidget
{
    protected function getStats(): array
    {
        // Total Pendapatan per Minggu (status 'paid')
        $weeklyEarnings = DB::table('transactions')
            ->where('payment_status', 'paid')
            ->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()])
            ->sum('grandtotal');

        // Total Pembayaran Sukses dan Gagal
        $successfulPayments = DB::table('transactions')
            ->where('payment_status', 'paid')
            ->count();

        $failedPayments = DB::table('transactions')
            ->where('payment_status', 'refunded')
            ->count();

        // Total Customer per Minggu (user_id unik)
        $weeklyCustomers = DB::table('transactions')
            ->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()])
            ->distinct('user_id')
            ->count('user_id');

        return [
            Stat::make('Total Pendapatan (Bulan Ini)', 'IDR ' . number_format($weeklyEarnings, 0, ',', '.'))
                ->icon('heroicon-o-currency-dollar')
                ->description('Pendapatan selama 7 hari terakhir')
                ->descriptionIcon('heroicon-o-arrow-trending-up')
                ->color('success'),

            Stat::make('Pembayaran Sukses / Gagal', "$successfulPayments / $failedPayments")
                ->icon('heroicon-o-check-circle')
                ->description('Jumlah pembayaran berhasil vs gagal')
                ->descriptionIcon('heroicon-o-x-circle')
                ->color('warning'),

            Stat::make('Total Customer (Bulan Ini)', $weeklyCustomers)
                ->icon('heroicon-o-user-group')
                ->description('Jumlah pelanggan unik minggu ini')
                ->descriptionIcon('heroicon-o-users')
                ->color('primary'),
        ];
    }
}