<?php

namespace App\Filament\Worker\Resources\YourDataResource\Pages;

use App\Filament\Worker\Resources\YourDataResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateYourData extends CreateRecord
{
    protected static string $resource = YourDataResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}