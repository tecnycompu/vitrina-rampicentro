<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;
use App\Models\User; // Asegúrate de importar User
use App\Models\CategoriaLocal;

class ProductoSeeder extends Seeder
{
    public function run()
    {
        $usuario = User::first(); // Obtener un usuario existente
        $categoria = CategoriaLocal::first(); // Obtener una categoría existente

        Producto::create([
            'nombreProducto' => 'Impresora HP',
            'descripcion' => 'Impresora multifuncional',
            'precio' => 150.00,
            'esIntangible' => false,
            'stock' => 10,
            'usuario_id' => $usuario->id,
            'categoria_local_id' => $categoria->id,
            'imagen' => '/images/impresora.jpg'
        ]);
    }
}
