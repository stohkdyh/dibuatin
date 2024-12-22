<?php

namespace App\Filament\Widgets;

use Illuminate\Support\Facades\DB;
use Filament\Widgets\ChartWidget;

class PemasukanChart extends ChartWidget
{
    protected static ?string $heading = 'Pemasukan Per Bulan';

    protected function getType(): string
    {
        return 'line';
    }

    protected function getData(): array
    {
        $data = collect(range(5, 0))->map(function ($monthsAgo) {
            $start = now()->subMonths($monthsAgo)->startOfMonth();
            $end = now()->subMonths($monthsAgo)->endOfMonth();

            return [
                'month' => $start->format('M Y'),
                'income' => DB::table('transactions')
                    ->where('payment_status', 'paid')
                    ->whereNull('deleted_at')
                    ->whereBetween('created_at', [$start, $end])
                    ->sum('grandtotal'),
            ];
        });

        return [
            'labels' => $data->pluck('month')->toArray(),
            'datasets' => [
                [
                    'label' => 'Pemasukan',
                    'data' => $data->pluck('income')->toArray(),
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'fill' => true,
                    'tension' => 0.4,
                ],
            ],
        ];
    }
}