<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrderDetails;
use App\Models\Pedido;
use App\Models\Producto;

class OrderDetailsSeeder extends Seeder
{
    public function run()
    {
        $pedido = Pedido::first(); // Obtener el primer pedido
        $producto = Producto::first(); // Obtener el primer producto

        OrderDetails::create([
            'pedido_id' => $pedido->id,
            'producto_id' => $producto->id,
            'cantidad' => 2,
            'precio' => 150.00
        ]);
    }
}
