<?php

namespace App\Filament\Resources\TransactionResource\Widgets;

use Illuminate\Support\Facades\DB;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $weeklyEarnings = DB::table('transactions')
            ->whereBetween('payment_date', [now()->startOfWeek(), now()->endOfWeek()])
            ->sum('grandtotal');

        $weeklyProjects = DB::table('transactions')
            ->where('payment_status', 'paid')
            ->whereBetween('payment_date', [now()->startOfWeek(), now()->endOfWeek()])
            ->count();

        return [
            Stat::make('Total Pendapatan (Minggu Ini)', 'IDR ' . number_format($weeklyEarnings, 0, ',', '.'))
                ->icon('heroicon-o-currency-dollar')
                ->description('Pendapatan selama 7 hari terakhir')
                ->descriptionIcon('heroicon-o-arrow-trending-up')
                ->color('success'),
            Stat::make('Total Proyek (Minggu Ini)', $weeklyProjects)
                ->icon('heroicon-o-briefcase')
                ->description('Jumlah proyek berhasil selama 7 hari terakhir')
                ->descriptionIcon('heroicon-o-check-circle')
                ->color('primary'),
        ];
    }
}