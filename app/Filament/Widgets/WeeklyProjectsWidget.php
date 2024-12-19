<?php

namespace App\Filament\Widgets;

use Illuminate\Support\Facades\DB;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class WeeklyProjectsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        // Hitung jumlah proyek dengan status "paid" per minggu
        $weeklyProjects = DB::table('transactions')
            ->where('payment_status', 'paid')
            ->whereBetween('payment_date', [now()->startOfWeek(), now()->endOfWeek()])
            ->count();

        return [
            Stat::make('Total Proyek (Minggu Ini)', $weeklyProjects)
                ->icon('heroicon-o-briefcase')
                ->description('Jumlah proyek berhasil selama 7 hari terakhir')
                ->descriptionIcon('heroicon-o-check-circle')
                ->color('primary'),
        ];
    }
}