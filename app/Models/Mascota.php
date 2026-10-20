<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mascota extends Model
{
    protected $table = 'mascotas';
    protected $primaryKey = 'id_mascota';

    protected $fillable = [
        'nombre', 'especie', 'raza', 'sexo', 'edad_aproximada', 'tamano',
        'color', 'esterilizado', 'vacunado', 'descripcion',
        'fecha_ingreso', 'estado', 'activo',
    ];

    protected $casts = [
        'esterilizado'  => 'boolean',
        'vacunado'      => 'boolean',
        'activo'        => 'boolean',
        'fecha_ingreso' => 'date',
    ];

    // Una mascota recibe varias solicitudes (1:N)
    public function solicitudes(): HasMany
    {
        return $this->hasMany(SolicitudAdopcion::class, 'id_mascota', 'id_mascota');
    }
}