<?php

namespace App\Filament\Worker\Resources\YourDataResource\Pages;

use App\Filament\Worker\Resources\YourDataResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditYourData extends EditRecord
{
    protected static string $resource = YourDataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}