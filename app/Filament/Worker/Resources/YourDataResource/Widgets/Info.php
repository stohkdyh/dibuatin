<?php

namespace App\Filament\Worker\Resources\YourDataResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;
use App\Models\File;
use App\Models\Project;
use App\Models\Order;
use Carbon\Carbon;

class Info extends BaseWidget
{
    protected function getStats(): array
    {
        $userId = Auth::id();

        // Total proyek yang diselesaikan oleh user
        $totalProjects = File::where('user_id', $userId)
            ->whereNull('deleted_at')
            ->count();

        // Total proyek hari ini dengan status ongoing atau review
        $totalProjectsToday = Project::where('user_id', $userId)
            ->whereNull('deleted_at')
            ->whereDate('created_at', Carbon::today())
            ->whereIn('status_project', ['ongoing', 'review'])
            ->count();

        // ID pelanggan yang terkait dengan proyek
        $customerIds = Project::where('user_id', $userId)
            ->whereNull('deleted_at')
            ->pluck('order_id')
            ->unique();

        // Total pelanggan unik
        $totalCustomers = Order::whereIn('id', $customerIds)
            ->whereNull('deleted_at')
            ->distinct('user_id')
            ->count('user_id');

        return [
            Stat::make('Total Projects Completed', $totalProjects)
                ->description('Projects completed by you')
                ->icon('heroicon-o-briefcase')
                ->color('success'),

            Stat::make('Total Projects Today', $totalProjectsToday)
                ->description('Projects created today')
                ->icon('heroicon-o-rectangle-stack')
                ->color('warning'),

            Stat::make('Total Customers', $totalCustomers)
                ->description('Unique customers served by you')
                ->icon('heroicon-o-user-group'),
        ];
    }
}