<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use App\Models\Rol;
use App\Models\Carrito;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        // Primero, eliminamos los registros en las tablas relacionadas con los usuarios (para evitar problemas con las claves foráneas)
        Carrito::query()->delete();  // Usamos query()->delete() para eliminar los registros de la tabla 'carritos'

        // Luego, eliminamos los usuarios existentes
        Usuario::query()->delete();  // Usamos query()->delete() para eliminar los registros de la tabla 'usuarios'

        // Buscar el rol "Admin" que ya existe
        $rol = Rol::firstWhere('nombreRol', 'Admin');

        if (!$rol) {
            // Si no existe el rol "Admin", crearlo (como respaldo, aunque no debería ser necesario)
            $rol = Rol::create([
                'nombreRol' => 'Admin'
            ]);
        }

        // Crear usuarios de prueba
        Usuario::create([
            'email' => 'test@example.com',
            'contraseña' => bcrypt('admin123'),
            'nombre' => 'Test User',
            'apellido' => 'User',
            'rol_id' => $rol->id
        ]);

        // Crear otro usuario de prueba
        Usuario::create([
            'email' => 'user@example.com',
            'contraseña' => bcrypt('user123'),
            'nombre' => 'John',
            'apellido' => 'Doe',
            'rol_id' => $rol->id
        ]);
    }
}
