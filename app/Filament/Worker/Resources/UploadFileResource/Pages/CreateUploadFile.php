<?php

namespace App\Filament\Worker\Resources\UploadFileResource\Pages;

use App\Filament\Worker\Resources\UploadFileResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUploadFile extends CreateRecord
{
    protected static string $resource = UploadFileResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}