<?php

namespace App\Filament\Widgets;

use Illuminate\Support\Facades\DB;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class OrderWidgets extends BaseWidget
{
    protected function getStats(): array
    {
        // Jumlah Order dengan status 'in progress'
        $inProgressOrders = DB::table('orders')
            ->where('status', 'in progress')
            ->count();

        // Jumlah Order dengan status 'pending'
        $pendingRequests = DB::table('orders')
            ->where('status', 'pending')
            ->count();

        // Paket yang paling banyak dipesan bulan ini
        $mostOrderedPackage = DB::table('orders')
            ->select('package_id', DB::raw('COUNT(package_id) as total'))
            ->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()])
            ->groupBy('package_id')
            ->orderByDesc('total')
            ->first();

        $mostOrderedPackageName = $mostOrderedPackage
            ? DB::table('packages')->where('id', $mostOrderedPackage->package_id)->value('name')
            : 'Tidak ada paket';

        return [
            Stat::make('Order dalam Proses', $inProgressOrders)
                ->icon('heroicon-o-clock')
                ->description('Jumlah order dengan status in progress')
                ->descriptionIcon('heroicon-o-arrow-trending-up')
                ->color('primary'),

            Stat::make('Request Order (Pending)', $pendingRequests)
                ->icon('heroicon-o-pencil')
                ->description('Jumlah order yang menunggu di proses')
                ->descriptionIcon('heroicon-o-arrow-right-circle')
                ->color('warning'),

            Stat::make('Paket Populer Bulan Ini', $mostOrderedPackageName)
                ->icon('heroicon-o-star')
                ->description('Paket yang paling sering dipesan bulan ini')
                ->descriptionIcon('heroicon-o-chart-bar')
                ->color('success'),
        ];
    }
}