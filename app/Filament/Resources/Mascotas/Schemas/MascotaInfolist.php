<?php

namespace App\Filament\Resources\Mascotas\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class MascotaInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nombre'),
                TextEntry::make('especie'),
                TextEntry::make('raza')
                    ->placeholder('-'),
                TextEntry::make('sexo'),
                TextEntry::make('edad_aproximada')
                    ->placeholder('-'),
                TextEntry::make('tamano')
                    ->placeholder('-'),
                TextEntry::make('color')
                    ->placeholder('-'),
                IconEntry::make('esterilizado')
                    ->boolean(),
                IconEntry::make('vacunado')
                    ->boolean(),
                TextEntry::make('descripcion')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('fecha_ingreso')
                    ->date(),
                TextEntry::make('estado'),
                IconEntry::make('activo')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
