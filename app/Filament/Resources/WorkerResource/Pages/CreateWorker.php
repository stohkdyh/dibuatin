<?php

namespace App\Filament\Resources\WorkerResource\Pages;

use Filament\Actions;
use Illuminate\Http\RedirectResponse;
use App\Filament\Resources\WorkerResource;
use Filament\Resources\Pages\CreateRecord;

class CreateWorker extends CreateRecord
{
    protected static string $resource = WorkerResource::class;

    protected function afterCreate(): RedirectResponse
    {
        return redirect()->route('filament.resources.workers.index');
    }
}