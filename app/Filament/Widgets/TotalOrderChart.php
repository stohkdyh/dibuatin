<?php

namespace App\Filament\Widgets;

use Illuminate\Support\Facades\DB;
use Filament\Widgets\ChartWidget;

class TotalOrderChart extends ChartWidget
{
    protected static ?string $heading = 'Total Order Per Bulan';

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getData(): array
    {
        // Ambil data total order per bulan selama 6 bulan terakhir
        $data = collect(range(5, 0))->map(function ($monthsAgo) {
            $start = now()->subMonths($monthsAgo)->startOfMonth();
            $end = now()->subMonths($monthsAgo)->endOfMonth();

            return [
                'month' => $start->format('M Y'),
                'orders' => DB::table('orders')
                    ->where('status', 'completed')
                    ->whereNull('deleted_at')
                    ->whereBetween('created_at', [$start, $end])
                    ->count(),
            ];
        });

        return [
            'labels' => $data->pluck('month')->toArray(),
            'datasets' => [
                [
                    'label' => 'Total Order',
                    'data' => $data->pluck('orders')->toArray(),
                    'backgroundColor' => 'rgba(54, 162, 235, 0.6)',
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'borderWidth' => 1,
                ],
            ],
        ];
    }
}