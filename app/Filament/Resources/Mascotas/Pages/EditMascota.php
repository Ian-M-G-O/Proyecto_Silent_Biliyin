<?php

namespace App\Filament\Resources\Mascotas\Pages;

use App\Filament\Resources\Mascotas\MascotaResource;
use App\Models\Mascota;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditMascota extends EditRecord
{
    protected static string $resource = MascotaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make()
                ->before(function (DeleteAction $action, Mascota $record) {
                    if ($record->solicitudes()->exists()) {
                        Notification::make()
                            ->title('No se puede eliminar')
                            ->body('Esta mascota tiene solicitudes de adopción. Desactívala en lugar de eliminarla.')
                            ->danger()
                            ->send();

                        $action->cancel();
                    }
                }),
        ];
    }
}
