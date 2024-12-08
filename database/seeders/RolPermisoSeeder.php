<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RolPermiso;
use App\Models\Rol;
use App\Models\Permiso;

class RolPermisoSeeder extends Seeder
{
    public function run()
    {
        $rol = Rol::first(); // Obtener el primer rol
        $permiso = Permiso::first(); // Obtener el primer permiso

        RolPermiso::create([
            'rol_id' => $rol->id,
            'permiso_id' => $permiso->id
        ]);
    }
}
