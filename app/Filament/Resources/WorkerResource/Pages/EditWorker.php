<?php

namespace App\Filament\Resources\WorkerResource\Pages;

use Filament\Actions;
use Illuminate\Http\RedirectResponse;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\WorkerResource;

class EditWorker extends EditRecord
{
    protected static string $resource = WorkerResource::class;

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