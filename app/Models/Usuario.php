<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasName;
use Filament\Panel;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable implements FilamentUser, HasName
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';

    protected $fillable = [
        'nombre_completo', 'correo', 'contrasena_hash', 'rol', 'activo',
    ];

    protected $hidden = ['contrasena_hash', 'remember_token'];

    protected $casts = ['activo' => 'boolean'];

    public function getAuthPassword(): string
    {
        return $this->contrasena_hash;
    }

    public function getAuthPasswordName(): string
    {
        return 'contrasena_hash';
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return (bool) $this->activo;
    }

    public function getFilamentName(): string
    {
        return $this->nombre_completo;
    }

    public function solicitudes(): HasMany
    {
        return $this->hasMany(SolicitudAdopcion::class, 'id_usuario', 'id_usuario');
    }
}
