<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Carrito;
use App\Models\User; // Asegúrate de importar User

class CarritoSeeder extends Seeder
{
    public function run()
    {
        $usuario = User::first(); // Obtener el primer usuario para asociarlo con el carrito

        Carrito::create([
            'usuario_id' => $usuario->id,
            'total_price' => 100.00
        ]);
    }
}
