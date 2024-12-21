<?php

namespace App\Filament\Worker\Resources\UploadFileResource\Pages;

use App\Filament\Worker\Resources\UploadFileResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUploadFiles extends ListRecords
{
    protected static string $resource = UploadFileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getHeading(): string
    {
        return __('Upload Files');
    }

    public function getSubheading(): string
    {
        return __("Upload the project file on this page, check if it matches the request!");
    }
}