<?php

namespace App\Filament\Resources\BenefitPackageResource\Pages;

use App\Filament\Resources\BenefitPackageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBenefitPackages extends ListRecords
{
    protected static string $resource = BenefitPackageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getHeading(): string
    {
        return __('List Benefit Packages');
    }
}