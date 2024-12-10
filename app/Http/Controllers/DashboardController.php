<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Producto;
use App\Models\Pedido;
use App\Models\CategoriaLocal;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display the dashboard with dynamic statistics
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Get the currently authenticated user
        $user = Auth::user();

        // Fetch dashboard statistics
        $datos = [
            'usuarios' => Usuario::count(),
            'productos' => Producto::count(),
            'pedidos' => Pedido::count(),
            'categorias' => CategoriaLocal::count(),
            
            // User-specific data if needed
            'userProductos' => $user ? Producto::where('usuario_id', $user->id)->count() : 0,
            'userPedidos' => $user ? Pedido::where('usuario_id', $user->id)->count() : 0
        ];

        // Recent orders
        $recentPedidos = Pedido::with('usuario')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Recent products
        $recentProductos = Producto::with('categoriaLocal')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('dashboard.index', [
            'datos' => $datos,
            'recentPedidos' => $recentPedidos,
            'recentProductos' => $recentProductos
        ]);
    }
}