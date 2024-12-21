<?php

namespace App\Filament\Worker\Resources\UploadFileResource\Pages;

use App\Filament\Worker\Resources\UploadFileResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUploadFile extends EditRecord
{
    protected static string $resource = UploadFileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}