<?php

namespace App\Policies;

use App\Models\Mascota;
use App\Models\Usuario;

class MascotaPolicy
{
    private function esAdmin(Usuario $user): bool
    {
        return strtolower($user->rol) === 'administrador';
    }

    private function esOperador(Usuario $user): bool
    {
        return strtolower($user->rol) === 'operador';
    }

    // Ver listado
    public function viewAny(Usuario $user): bool
    {
        return $this->esAdmin($user) || $this->esOperador($user);
    }

    // Ver un registro
    public function view(Usuario $user, Mascota $mascota): bool
    {
        return $this->esAdmin($user) || $this->esOperador($user);
    }

    // Crear
    public function create(Usuario $user): bool
    {
        return $this->esAdmin($user) || $this->esOperador($user);
    }

    // Editar
    public function update(Usuario $user, Mascota $mascota): bool
    {
        return $this->esAdmin($user) || $this->esOperador($user);
    }

    // Eliminar: solo administrador
    public function delete(Usuario $user, Mascota $mascota): bool
    {
        return $this->esAdmin($user);
    }

    // Eliminación masiva (Filament la usa para el botón de borrar en bloque)
    public function deleteAny(Usuario $user): bool
    {
        return $this->esAdmin($user);
    }

    // Solo aplican si Mascota usa SoftDeletes
    public function restore(Usuario $user, Mascota $mascota): bool
    {
        return $this->esAdmin($user);
    }

    public function restoreAny(Usuario $user): bool
    {
        return $this->esAdmin($user);
    }

    public function forceDelete(Usuario $user, Mascota $mascota): bool
    {
        return $this->esAdmin($user);
    }

    public function forceDeleteAny(Usuario $user): bool
    {
        return $this->esAdmin($user);
    }
}
