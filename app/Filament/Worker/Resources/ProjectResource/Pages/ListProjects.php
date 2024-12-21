<?php

namespace App\Filament\Worker\Resources\ProjectResource\Pages;

use App\Filament\Worker\Resources\ProjectResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProjects extends ListRecords
{
    protected static string $resource = ProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }

    public function getHeading(): string
    {
        return __('Your Projects');
    }
    public function getSubheading(): string
    {
        return __("Always work on projects with appropriate order requests.");
    }
}