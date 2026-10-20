<?php

namespace Database\Seeders;

use App\Models\Adopcion;
use App\Models\Adoptante;
use App\Models\Mascota;
use App\Models\SolicitudAdopcion;
use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ---------- USUARIOS ----------
        $admin = Usuario::create([
            'nombre_completo' => 'Mariel Yatzil Alvarado Aguilar',
            'correo' => 'admin@pawfriends.test',
            'contrasena_hash' => Hash::make('Admin123*'),
            'rol' => 'Administrador',
            'activo' => true,
        ]);
        $operador = Usuario::create([
            'nombre_completo' => 'Ian Miguel Gonzalez Ortega',
            'correo' => 'operador@pawfriends.test',
            'contrasena_hash' => Hash::make('Operador123*'),
            'rol' => 'Operador',
            'activo' => true,
        ]);

        // ---------- MASCOTAS ----------
        $m = [];
        $m['firulais'] = Mascota::create([
            'nombre' => 'Firulais', 'especie' => 'Perro', 'raza' => 'Criollo', 'sexo' => 'Macho',
            'edad_aproximada' => '2 años', 'tamano' => 'Mediano', 'color' => 'Café',
            'esterilizado' => true, 'vacunado' => true,
            'descripcion' => 'Juguetón y muy sociable.',
            'fecha_ingreso' => '2026-08-01', 'estado' => 'Disponible',
        ]);
        $m['luna'] = Mascota::create([
            'nombre' => 'Luna', 'especie' => 'Gato', 'raza' => 'Siamés', 'sexo' => 'Hembra',
            'edad_aproximada' => '1 año', 'tamano' => 'Pequeño', 'color' => 'Crema',
            'esterilizado' => true, 'vacunado' => true,
            'descripcion' => 'Tranquila y cariñosa.',
            'fecha_ingreso' => '2026-08-15', 'estado' => 'En proceso',
        ]);
        $m['rocky'] = Mascota::create([
            'nombre' => 'Rocky', 'especie' => 'Perro', 'raza' => 'Labrador', 'sexo' => 'Macho',
            'edad_aproximada' => '4 años', 'tamano' => 'Grande', 'color' => 'Negro',
            'esterilizado' => true, 'vacunado' => true,
            'descripcion' => 'Obediente y protector.',
            'fecha_ingreso' => '2026-07-10', 'estado' => 'Adoptada',
        ]);
        $m['mia'] = Mascota::create([
            'nombre' => 'Mía', 'especie' => 'Gato', 'raza' => 'Criollo', 'sexo' => 'Hembra',
            'edad_aproximada' => '6 meses', 'tamano' => 'Pequeño', 'color' => 'Atigrado',
            'esterilizado' => false, 'vacunado' => true,
            'descripcion' => 'Cachorra curiosa.',
            'fecha_ingreso' => '2026-09-20', 'estado' => 'Disponible',
        ]);
        $m['toby'] = Mascota::create([
            'nombre' => 'Toby', 'especie' => 'Perro', 'raza' => 'Chihuahua', 'sexo' => 'Macho',
            'edad_aproximada' => '3 años', 'tamano' => 'Pequeño', 'color' => 'Blanco',
            'esterilizado' => true, 'vacunado' => false,
            'descripcion' => 'En recuperación veterinaria.',
            'fecha_ingreso' => '2026-09-05', 'estado' => 'No disponible',
        ]);

        // ---------- ADOPTANTES ----------
        $a1 = Adoptante::create([
            'nombre' => 'Carlos', 'apellidos' => 'Ramírez López', 'fecha_nacimiento' => '1990-03-12',
            'telefono' => '5512345678', 'correo' => 'carlos.ramirez@mail.com',
            'direccion' => 'Av. Reforma 123, CDMX', 'tipo_vivienda' => 'Casa',
            'tiene_otras_mascotas' => false, 'fecha_registro' => '2026-09-01',
        ]);
        $a2 = Adoptante::create([
            'nombre' => 'Ana', 'apellidos' => 'Martínez Soto', 'fecha_nacimiento' => '1995-07-25',
            'telefono' => '5598765432', 'correo' => 'ana.martinez@mail.com',
            'direccion' => 'Calle Pino 45, CDMX', 'tipo_vivienda' => 'Departamento',
            'tiene_otras_mascotas' => true, 'fecha_registro' => '2026-09-10',
        ]);
        $a3 = Adoptante::create([
            'nombre' => 'Luis', 'apellidos' => 'Hernández Cruz', 'fecha_nacimiento' => '1988-11-02',
            'telefono' => '5534567890', 'correo' => 'luis.hernandez@mail.com',
            'direccion' => 'Calle Olmo 78, Edo. Méx.', 'tipo_vivienda' => 'Casa',
            'tiene_otras_mascotas' => true, 'fecha_registro' => '2026-08-20',
        ]);

        // ---------- SOLICITUDES ----------
        // Luna: solicitud En revisión (mascota En proceso, RN03)
        SolicitudAdopcion::create([
            'id_mascota' => $m['luna']->id_mascota, 'id_adoptante' => $a2->id_adoptante,
            'id_usuario' => $operador->id_usuario, 'fecha_solicitud' => '2026-10-02',
            'motivo' => 'Busco una compañera para mi hogar.', 'estado' => 'En revisión',
        ]);
        // Rocky: solicitud Completada (mascota Adoptada, RN05)
        $solRocky = SolicitudAdopcion::create([
            'id_mascota' => $m['rocky']->id_mascota, 'id_adoptante' => $a3->id_adoptante,
            'id_usuario' => $admin->id_usuario, 'fecha_solicitud' => '2026-08-05',
            'motivo' => 'Quiero un perro guardián.', 'estado' => 'Completada',
            'observaciones' => 'Visita domiciliaria aprobada.', 'fecha_resolucion' => '2026-08-20',
        ]);
        // Firulais: solicitud Rechazada (mascota vuelve a Disponible, RN06)
        SolicitudAdopcion::create([
            'id_mascota' => $m['firulais']->id_mascota, 'id_adoptante' => $a1->id_adoptante,
            'id_usuario' => $operador->id_usuario, 'fecha_solicitud' => '2026-09-15',
            'motivo' => 'Deseo adoptar un perro.', 'estado' => 'Rechazada',
            'observaciones' => 'Vivienda sin espacio suficiente.', 'fecha_resolucion' => '2026-09-18',
        ]);
        // Mía: solicitud Pendiente
        // (por RN02/RN03, Mía sigue Disponible hasta que la solicitud avance a En revisión)
        SolicitudAdopcion::create([
            'id_mascota' => $m['mia']->id_mascota, 'id_adoptante' => $a1->id_adoptante,
            'id_usuario' => $operador->id_usuario, 'fecha_solicitud' => '2026-10-10',
            'motivo' => 'Quiero una gatita.', 'estado' => 'Pendiente',
        ]);

        // ---------- ADOPCIONES ----------
        Adopcion::create([
            'id_solicitud' => $solRocky->id_solicitud,
            'fecha_adopcion' => '2026-08-22',
            'observaciones' => 'Entrega realizada con firma de responsiva.',
            'fecha_seguimiento' => '2026-09-22',
        ]);
    }
}
