<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('adopciones', function (Blueprint $table) {
            $table->id('id_adopcion');
            $table->foreignId('id_solicitud')                 // relación 1 : 0..1 (UK)
                  ->unique()
                  ->constrained('solicitudes_adopcion', 'id_solicitud');
            $table->date('fecha_adopcion');
            $table->text('observaciones')->nullable();
            $table->date('fecha_seguimiento')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('adopciones');
    }
};
