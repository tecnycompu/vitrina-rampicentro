<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductoCategoria;
use App\Models\Producto;
use App\Models\CategoriaLocal;

class ProductoCategoriaSeeder extends Seeder
{
    public function run()
    {
        $producto = Producto::first(); // Obtener un producto
        $categoria = CategoriaLocal::first(); // Obtener una categoría

        ProductoCategoria::create([
            'producto_id' => $producto->id,
            'categoria_local_id' => $categoria->id
        ]);
    }
}
