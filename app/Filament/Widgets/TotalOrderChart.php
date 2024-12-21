<?php

namespace App\Filament\Widgets;

use Illuminate\Support\Facades\DB;
use Filament\Widgets\ChartWidget;

class TotalOrderChart extends ChartWidget
{
    protected static ?string $heading = 'Total Order Per Bulan';

    /**
     * Tipe chart adalah bar.
     */
    protected function getType(): string
    {
        return 'bar';
    }

    /**
     * Ambil data untuk chart.
     */
    protected function getData(): array
    {
        // Ambil data total order per bulan selama 6 bulan terakhir
        $data = collect(range(5, 0))->map(function ($monthsAgo) {
            $start = now()->subMonths($monthsAgo)->startOfMonth();
            $end = now()->subMonths($monthsAgo)->endOfMonth();

            return [
                'month' => $start->format('M Y'),
                'orders' => DB::table('orders')
                    ->where('status', 'completed') // Hanya menghitung order yang selesai
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