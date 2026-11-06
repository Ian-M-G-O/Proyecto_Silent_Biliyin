<?php

namespace App\Filament\Resources\Mascotas;

use App\Filament\Resources\Mascotas\Pages\CreateMascota;
use App\Filament\Resources\Mascotas\Pages\EditMascota;
use App\Filament\Resources\Mascotas\Pages\ListMascotas;
use App\Filament\Resources\Mascotas\Pages\ViewMascota;
use App\Filament\Resources\Mascotas\Schemas\MascotaForm;
use App\Filament\Resources\Mascotas\Schemas\MascotaInfolist;
use App\Filament\Resources\Mascotas\Tables\MascotasTable;
use App\Models\Mascota;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MascotaResource extends Resource
{
    protected static ?string $model = Mascota::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nombre';

    public static function form(Schema $schema): Schema
    {
        return MascotaForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return MascotaInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MascotasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListMascotas::route('/'),
            'create' => CreateMascota::route('/create'),
            'view' => ViewMascota::route('/{record}'),
            'edit' => EditMascota::route('/{record}/edit'),
        ];
    }
}
