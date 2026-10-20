<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Adoptante extends Model
{
    protected $table = 'adoptantes';
    protected $primaryKey = 'id_adoptante';

    protected $fillable = [
        'nombre', 'apellidos', 'fecha_nacimiento', 'telefono', 'correo',
        'direccion', 'tipo_vivienda', 'tiene_otras_mascotas',
        'fecha_registro', 'activo',
    ];

    protected $casts = [
        'fecha_nacimiento'     => 'date',
        'fecha_registro'       => 'date',
        'tiene_otras_mascotas' => 'boolean',
        'activo'               => 'boolean',
    ];

    public function solicitudes(): HasMany
    {
        return $this->hasMany(SolicitudAdopcion::class, 'id_adoptante', 'id_adoptante');
    }
}