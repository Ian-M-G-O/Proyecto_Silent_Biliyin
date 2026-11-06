<?php

namespace App\Filament\Resources\Mascotas\Pages;

use App\Filament\Resources\Mascotas\MascotaResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewMascota extends ViewRecord
{
    protected static string $resource = MascotaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
