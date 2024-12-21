<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Filament\Widgets\BarChartWidget;
use Filament\Widgets\LineChartWidget;

class ChartsWidgets extends ChartWidget
{
    // Chart 1: Pemasukan per Bulan
    public static function incomeChart(): LineChartWidget
    {
        $data = collect(range(5, 0))->map(function ($monthsAgo) {
            $start = now()->subMonths($monthsAgo)->startOfMonth();
            $end = now()->subMonths($monthsAgo)->endOfMonth();

            return [
                'month' => $start->format('M Y'),
                'income' => DB::table('transactions')
                    ->where('payment_status', 'paid')
                    ->whereBetween('payment_date', [$start, $end])
                    ->sum('grandtotal'),
            ];
        });

        return LineChartWidget::make()
            ->setTitle('Pemasukan Tiap Bulan')
            ->setData([
                'labels' => $data->pluck('month'),
                'datasets' => [
                    [
                        'label' => 'Pemasukan',
                        'data' => $data->pluck('income'),
                        'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                        'borderColor' => 'rgba(75, 192, 192, 1)',
                        'fill' => true,
                        'tension' => 0.4,
                    ],
                ],
            ]);
    }

    // Chart 2: Total Order per Bulan
    public static function orderChart(): BarChartWidget
    {
        $data = collect(range(5, 0))->map(function ($monthsAgo) {
            $start = now()->subMonths($monthsAgo)->startOfMonth();
            $end = now()->subMonths($monthsAgo)->endOfMonth();

            return [
                'month' => $start->format('M Y'),
                'orders' => DB::table('orders')
                    ->where('status', 'completed')
                    ->whereBetween('created_at', [$start, $end])
                    ->count(),
            ];
        });

        return BarChartWidget::make()
            ->setTitle('Total Order Tiap Bulan')
            ->setData([
                'labels' => $data->pluck('month'),
                'datasets' => [
                    [
                        'label' => 'Total Order',
                        'data' => $data->pluck('orders'),
                        'backgroundColor' => 'rgba(54, 162, 235, 0.6)',
                        'borderColor' => 'rgba(54, 162, 235, 1)',
                        'borderWidth' => 1,
                    ],
                ],
            ]);
    }
}