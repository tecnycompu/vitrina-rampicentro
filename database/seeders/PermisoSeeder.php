<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permiso;

class PermisoSeeder extends Seeder
{
    public function run()
    {
        Permiso::create([
            'nombrePermiso' => 'VER_PRODUCTOS',
            'descripcion' => 'Permite ver productos disponibles en la plataforma'
        ]);

        Permiso::create([
            'nombrePermiso' => 'CREAR_PRODUCTO',
            'descripcion' => 'Permite crear nuevos productos'
        ]);
    }
}
