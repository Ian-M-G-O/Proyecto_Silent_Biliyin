<?php

namespace App\Filament\Resources\Mascotas\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class MascotaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Datos generales')
                ->schema([
                    TextInput::make('nombre')
                        ->label('Nombre')
                        ->placeholder('Ej. Firulais')
                        ->required()
                        ->maxLength(100),
                    Select::make('especie')
                        ->label('Especie')
                        ->options(['Perro' => 'Perro', 'Gato' => 'Gato', 'Otro' => 'Otro'])
                        ->required(),
                    TextInput::make('raza')
                        ->label('Raza')
                        ->placeholder('Ej. Labrador')
                        ->maxLength(100),
                    Radio::make('sexo')
                        ->label('Sexo')
                        ->options(['Macho' => 'Macho', 'Hembra' => 'Hembra'])
                        ->inline()
                        ->required(),
                    TextInput::make('edad_aproximada')
                        ->label('Edad aproximada')
                        ->placeholder('Ej. 2 años')
                        ->maxLength(50),
                    Select::make('tamano')
                        ->label('Tamaño')
                        ->options(['Pequeño' => 'Pequeño', 'Mediano' => 'Mediano', 'Grande' => 'Grande']),
                    TextInput::make('color')
                        ->label('Color')
                        ->maxLength(80),
                ])
                ->columns(2),

            Section::make('Salud y estado')
                ->schema([
                    Toggle::make('esterilizado')->label('Esterilizado'),
                    Toggle::make('vacunado')->label('Vacunado'),
                    DatePicker::make('fecha_ingreso')
                        ->label('Fecha de ingreso')
                        ->default(now())
                        ->maxDate(now())
                        ->required()
                        ->validationMessages([
                            'before_or_equal' => 'La fecha de ingreso no puede ser futura.',
                        ]),
                    Select::make('estado')
                        ->label('Estado')
                        ->options([
                            'Disponible'    => 'Disponible',
                            'En proceso'    => 'En proceso',
                            'Adoptada'      => 'Adoptada',
                            'No disponible' => 'No disponible',
                        ])
                        ->hiddenOn('create')
                        ->disabled(fn () => auth()->user()?->rol !== 'Administrador')
                        ->helperText('Solo el administrador puede cambiarlo manualmente.'),
                    Toggle::make('activo')
                        ->label('Activa')
                        ->default(true)
                        ->hiddenOn('create'),
                    Textarea::make('descripcion')
                        ->label('Descripción')
                        ->placeholder('Carácter, cuidados especiales, historia...')
                        ->rows(3)
                        ->columnSpanFull(),
                ])
                ->columns(2),
        ]);
    }
}
