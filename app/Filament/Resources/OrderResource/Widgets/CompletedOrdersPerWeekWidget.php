<?php

namespace App\Filament\Resources\OrderResource\Widgets;

use Carbon\Carbon;
use App\Models\Order;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class CompletedOrdersPerWeekWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $completedOrdersThisWeek = Order::where('status', 'completed')
            ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->count();

        return [
            Stat::make('Completed Orders This Week', $completedOrdersThisWeek)
                ->description('Total orders completed this week')
                ->color('success')
                ->icon('heroicon-o-check-circle'),
        ];
    }
}