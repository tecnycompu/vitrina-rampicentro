<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rol;

class RolSeeder extends Seeder
{
    public function run()
    {
        // Verifica si el rol existe antes de crearlo
        Rol::firstOrCreate(
            ['nombreRol' => 'Admin'], // Condición para verificar si ya existe
            ['created_at' => now(), 'updated_at' => now()] // Valores para insertar si no existe
        );

        Rol::firstOrCreate(
            ['nombreRol' => 'User'],
            ['created_at' => now(), 'updated_at' => now()]
        );
    }
}
