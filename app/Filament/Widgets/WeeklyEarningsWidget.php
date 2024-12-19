<?php

namespace App\Filament\Widgets;

use Illuminate\Support\Facades\DB;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class WeeklyEarningsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        // Hitung total pendapatan per minggu
        $weeklyEarnings = DB::table('transactions')
            ->whereBetween('payment_date', [now()->startOfWeek(), now()->endOfWeek()])
            ->sum('grandtotal');

        return [
            Stat::make('Total Pendapatan (Minggu Ini)', 'IDR ' . number_format($weeklyEarnings, 0, ',', '.'))
                ->icon('heroicon-o-currency-dollar')
                ->description('Pendapatan selama 7 hari terakhir')
                ->descriptionIcon('heroicon-o-arrow-trending-up')
                ->color('success'),
        ];
    }
}