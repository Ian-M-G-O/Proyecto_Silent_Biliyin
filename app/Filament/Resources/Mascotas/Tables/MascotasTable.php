<?php

namespace App\Filament\Resources\Mascotas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MascotasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nombre')
                    ->searchable(),
                TextColumn::make('especie')
                    ->searchable(),
                TextColumn::make('raza')
                    ->searchable(),
                TextColumn::make('sexo')
                    ->searchable(),
                TextColumn::make('edad_aproximada')
                    ->searchable(),
                TextColumn::make('tamano')
                    ->searchable(),
                TextColumn::make('color')
                    ->searchable(),
                IconColumn::make('esterilizado')
                    ->boolean(),
                IconColumn::make('vacunado')
                    ->boolean(),
                TextColumn::make('fecha_ingreso')
                    ->date()
                    ->sortable(),
                TextColumn::make('estado')
                    ->searchable(),
                IconColumn::make('activo')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
