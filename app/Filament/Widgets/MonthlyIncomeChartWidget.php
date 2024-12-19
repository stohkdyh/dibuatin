<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class MonthlyIncomeChartWidget extends ChartWidget
{
    protected static ?string $heading = 'Grafik Pemasukan (Bulanan)';

    protected static ?int $height = 200; // Adjust height for smaller chart

    protected function getData(): array
    {
        $monthlyIncome = DB::table('transactions')
            ->selectRaw("strftime('%m', payment_date) as month, SUM(grandtotal) as total")
            ->whereRaw("strftime('%Y', payment_date) = ?", [now()->format('Y')])
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month')
            ->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Pemasukan',
                    'data' => array_values($monthlyIncome),
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'borderWidth' => 1,
                ],
            ],
            'labels' => array_map(function ($month) {
                return date('F', mktime(0, 0, 0, (int) $month, 1));
            }, array_keys($monthlyIncome)),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}