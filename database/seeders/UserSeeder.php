<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Modelo predeterminado de Laravel

class UserSeeder extends Seeder
{
    public function run()
    {
        // Crear un usuario administrador si no existe
        User::firstOrCreate([
            'email' => 'admin@example.com'
        ], [
            'name' => 'Administrador',
            'password' => bcrypt('password'), // Cambia esto por un valor seguro
            'rol_id' => 1, // Asegúrate de que el rol con ID 1 exista en la tabla roles
        ]);
    }
}
