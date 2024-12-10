<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario; // Importar el modelo Usuario
use App\Models\Producto; // Importar el modelo Producto
use App\Models\Pedido; // Importar el modelo Pedido

class DashboardController extends Controller
{
    public function index()
    {
        $datos = [
            'usuarios' => Usuario::count(),
            'productos' => Producto::count(),
            'pedidos' => Pedido::count(),
            'pedidos_recientes' => Pedido::latest()->take(5)->get(),
        ];

        return view('dashboard.index', compact('datos'));
    }
}
