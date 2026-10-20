<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Adopcion extends Model
{
    protected $table = 'adopciones';
    protected $primaryKey = 'id_adopcion';

    protected $fillable = [
        'id_solicitud', 'fecha_adopcion', 'observaciones', 'fecha_seguimiento',
    ];

    protected $casts = [
        'fecha_adopcion'    => 'date',
        'fecha_seguimiento' => 'date',
    ];

    public function solicitud(): BelongsTo
    {
        return $this->belongsTo(SolicitudAdopcion::class, 'id_solicitud', 'id_solicitud');
    }
}

