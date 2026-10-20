<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('adoptantes', function (Blueprint $table) {
            $table->id('id_adoptante');
            $table->string('nombre', 100);
            $table->string('apellidos', 120);
            $table->date('fecha_nacimiento');                 // RN09 (mayor de 18)
            $table->string('telefono', 20);
            $table->string('correo', 150)->unique();          // RN10
            $table->string('direccion', 255);
            $table->string('tipo_vivienda', 50)->nullable();
            $table->boolean('tiene_otras_mascotas')->default(false);
            $table->date('fecha_registro');
            $table->boolean('activo')->default(true);         // RN14
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('adoptantes');
    }
};
