<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CategoriaLocal;

class CategoriaLocalSeeder extends Seeder
{
    public function run()
    {
        CategoriaLocal::create([
            'nombreCategoria' => 'Impresoras',
            'descripcion' => 'Productos relacionados con la venta y reparación de impresoras',
            'imagen' => '/images/impresoras.jpg'
        ]);

        CategoriaLocal::create([
            'nombreCategoria' => 'Servicios Técnicos',
            'descripcion' => 'Locales dedicados a servicios de reparación y mantenimiento',
            'imagen' => '/images/servicios_tecnicos.jpg'
        ]);
    }
}
