<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use App\Models\Rol;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        // Crear un rol de ejemplo
        $rol = Rol::create([
            'nombreRol' => 'Admin'
        ]);

        // Crear usuarios de prueba
        Usuario::create([
            'email' => 'admin@admin.com',
            'contraseña' => bcrypt('admin123'),
            'nombre' => 'Admin',
            'apellido' => 'Admin',
            'rol_id' => $rol->id
        ]);

        // Crear más usuarios si es necesario
    }
}