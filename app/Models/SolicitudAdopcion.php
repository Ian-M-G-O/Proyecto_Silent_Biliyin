<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SolicitudAdopcion extends Model
{
    protected $table = 'solicitudes_adopcion';
    protected $primaryKey = 'id_solicitud';

    protected $fillable = [
        'id_mascota', 'id_adoptante', 'id_usuario', 'fecha_solicitud',
        'motivo', 'estado', 'observaciones', 'fecha_resolucion',
    ];

    protected $casts = [
        'fecha_solicitud'  => 'date',
        'fecha_resolucion' => 'date',
    ];

    public function mascota(): BelongsTo
    {
        return $this->belongsTo(Mascota::class, 'id_mascota', 'id_mascota');
    }

    public function adoptante(): BelongsTo
    {
        return $this->belongsTo(Adoptante::class, 'id_adoptante', 'id_adoptante');
    }

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id_usuario');
    }

    public function adopcion(): HasOne
    {
        return $this->hasOne(Adopcion::class, 'id_solicitud', 'id_solicitud');
    }
}
