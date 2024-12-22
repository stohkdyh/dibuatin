<?php

namespace App\Filament\Widgets;

use Illuminate\Support\Facades\DB;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class TransactionWidgets extends BaseWidget
{
    protected function getStats(): array
    {
        $weeklyEarnings = DB::table('transactions')
            ->where('payment_status', 'paid')
            ->whereNull('deleted_at')
            ->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()])
            ->sum('grandtotal');

        $successfulPayments = DB::table('transactions')
            ->where('payment_status', 'paid')
            ->whereNull('deleted_at')
            ->count();

        $failedPayments = DB::table('transactions')
            ->where('payment_status', 'refunded')
            ->whereNull('deleted_at')
            ->count();

        $weeklyCustomers = DB::table('transactions')
            ->whereNull('deleted_at')
            ->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()])
            ->distinct('user_id')
            ->count('user_id');

        return [
            Stat::make('Total Pendapatan (Bulan Ini)', 'IDR ' . number_format($weeklyEarnings, 0, ',', '.'))
                ->icon('heroicon-o-currency-dollar')
                ->description('Pendapatan (Bulain Ini)')
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