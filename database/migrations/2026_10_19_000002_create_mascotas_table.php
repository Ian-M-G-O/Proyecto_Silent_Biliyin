<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mascotas', function (Blueprint $table) {
            $table->id('id_mascota');
            $table->string('nombre', 100);                    // RN11
            $table->string('especie', 50);                    // RN11
            $table->string('raza', 100)->nullable();
            $table->enum('sexo', ['Macho', 'Hembra']);        // RN11
            $table->string('edad_aproximada', 50)->nullable();
            $table->enum('tamano', ['Pequeño', 'Mediano', 'Grande'])->nullable();
            $table->string('color', 80)->nullable();
            $table->boolean('esterilizado')->default(false);
            $table->boolean('vacunado')->default(false);
            $table->text('descripcion')->nullable();
            $table->date('fecha_ingreso');                    // RN11
            $table->enum('estado', ['Disponible', 'En proceso', 'Adoptada', 'No disponible'])
                  ->default('Disponible');                    // RN01
            $table->boolean('activo')->default(true);         // RN14 baja lógica
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mascotas');
    }
};
