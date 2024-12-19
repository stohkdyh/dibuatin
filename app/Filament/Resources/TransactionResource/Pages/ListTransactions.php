<?php

namespace App\Filament\Resources\TransactionResource\Pages;

use App\Filament\Resources\TransactionResource;
use App\Filament\Resources\TransactionResource\Widgets\StatsOverview;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTransactions extends ListRecords
{
    protected static string $resource = TransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getHeading(): string
    {
        return __('Transaction Center');
    }

    public function getHeaderWidgetsColumns(): array|int|string
    {
        return 2;
    }

    public function getHeaderWidgets(): array
    {
        return [
            StatsOverview::class,
        ];
    }
}