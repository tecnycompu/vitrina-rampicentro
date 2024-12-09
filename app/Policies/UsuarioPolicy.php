<?php
namespace App\Policies;

use App\Models\Usuario;
use App\Models\User;

class UsuarioPolicy
{
    public function view(Usuario $usuarioActual, Usuario $usuario)
    {
        // Solo administradores o el mismo usuario pueden ver detalles
        return $usuarioActual->rol->nombreRol === 'ADMIN' || 
               $usuarioActual->id === $usuario->id;
    }

    public function update(Usuario $usuarioActual, Usuario $usuario)
    {
        return $usuarioActual->rol->nombreRol === 'ADMIN' || 
               $usuarioActual->id === $usuario->id;
    }

    public function delete(Usuario $usuarioActual, Usuario $usuario)
    {
        return $usuarioActual->rol->nombreRol === 'ADMIN';
    }
}