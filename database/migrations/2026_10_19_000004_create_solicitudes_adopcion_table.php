<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('solicitudes_adopcion', function (Blueprint $table) {
            $table->id('id_solicitud');

            $table->foreignId('id_mascota')
                  ->constrained('mascotas', 'id_mascota');
            $table->foreignId('id_adoptante')
                  ->constrained('adoptantes', 'id_adoptante');
            $table->foreignId('id_usuario')                   // RN15 trazabilidad
                  ->constrained('usuarios', 'id_usuario');

            $table->date('fecha_solicitud');
            $table->text('motivo')->nullable();
            $table->enum('estado', [
                'Pendiente', 'En revisión', 'Aprobada',
                'Rechazada', 'Cancelada', 'Completada',
            ])->default('Pendiente');                         // RN07
            $table->text('observaciones')->nullable();
            $table->date('fecha_resolucion')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('solicitudes_adopcion');
    }
};
