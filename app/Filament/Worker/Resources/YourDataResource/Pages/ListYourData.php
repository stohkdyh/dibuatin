<?php

namespace App\Filament\Worker\Resources\YourDataResource\Pages;

use App\Filament\Worker\Resources\YourDataResource;
use App\Filament\Worker\Resources\YourDataResource\Widgets\Info;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListYourData extends ListRecords
{
    protected static string $resource = YourDataResource::class;

    protected function getHeaderWidgets(): array
    {
        return [
            Info::class,
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }

    public function getHeading(): string
    {
        return __('Welcome sir,');
    }
    public function getSubheading(): string
    {
        return __("Don't forget to always activate your status, have a good day!");
    }
}