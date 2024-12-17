<?php

namespace App\Filament\Resources\OrderResource\Widgets;

use App\Models\Order;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class PendingOrdersWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $pendingOrders = Order::where('status', 'pending')->count();

        return [
            Stat::make('Pending Orders', $pendingOrders)
                ->description('Total pending orders')
                ->color('warning')
                ->icon('heroicon-o-clock'),
        ];
    }
}