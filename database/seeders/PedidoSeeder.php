<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pedido;
use App\Models\User; // Asegúrate de importar User

class PedidoSeeder extends Seeder
{
    public function run()
    {
        $usuario = User::first(); // Obtener un usuario

        Pedido::create([
            'usuario_id' => $usuario->id,
            'fecha' => now(),
            'total_price' => 200.00,
            'status' => true,
            'direccion_envio' => 'Calle Ficticia 123'
        ]);
    }
}
