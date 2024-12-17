<?php

namespace App\Filament\Resources\TypeProductResource\Pages;

use App\Filament\Resources\TypeProductResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTypeProduct extends EditRecord
{
    protected static string $resource = TypeProductResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}