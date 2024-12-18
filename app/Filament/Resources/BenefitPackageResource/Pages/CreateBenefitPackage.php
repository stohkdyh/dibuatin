<?php

namespace App\Filament\Resources\BenefitPackageResource\Pages;

use Filament\Actions;
use App\Models\BenefitPackage;
use Illuminate\Support\Facades\Log;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\BenefitPackageResource;

class CreateBenefitPackage extends CreateRecord
{
    protected static string $resource = BenefitPackageResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}