<?php

namespace App\Filament\Resources\BenefitPackageResource\Pages;

use App\Filament\Resources\BenefitPackageResource;
use App\Models\BenefitPackage;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBenefitPackage extends EditRecord
{
    protected static string $resource = BenefitPackageResource::class;

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