<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Usuario extends Authenticatable
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';

    protected $fillable = [
        'nombre_completo', 'correo', 'contrasena_hash', 'rol', 'activo',
    ];

    protected $hidden = ['contrasena_hash'];

    protected $casts = ['activo' => 'boolean'];

    public function getAuthPassword(): string
    {
        return $this->contrasena_hash;
    }

    public function solicitudes(): HasMany
    {
        return $this->hasMany(SolicitudAdopcion::class, 'id_usuario', 'id_usuario');
    }
}
