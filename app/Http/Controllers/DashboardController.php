<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Producto;
use App\Models\Pedido;
use App\Models\CategoriaLocal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Datos generales
        $datos = [
            'usuarios' => User::count(),
            'productos' => Producto::count(),
            'pedidos' => Pedido::count(),
            'categorias' => CategoriaLocal::count(),
        ];

        // Contenido específico por rol
        switch ($user->rol->nombreRol) {
            case 'Admin':
                $datos = $this->getDatosAdmin($datos);
                $recentPedidos = Pedido::with('usuario')
                    ->orderBy('created_at', 'desc')
                    ->take(5)
                    ->get();
                $recentProductos = Producto::with('categoriaLocal')
                    ->orderBy('created_at', 'desc')
                    ->take(5)
                    ->get();
                break;

            case 'User':
                $datos = $this->getDatosUser($user, $datos);
                $recentPedidos = Pedido::where('usuario_id', $user->id)
                    ->orderBy('created_at', 'desc')
                    ->take(5)
                    ->get();
                $recentProductos = Producto::where('usuario_id', $user->id)
                    ->with('categoriaLocal')
                    ->orderBy('created_at', 'desc')
                    ->take(5)
                    ->get();
                break;

            default:
                $recentPedidos = collect();
                $recentProductos = collect();
                break;
        }

        return view('dashboard.index', [
            'datos' => $datos,
            'recentPedidos' => $recentPedidos,
            'recentProductos' => $recentProductos,
            'userRole' => $user->rol->nombreRol
        ]);
    }

    private function getDatosAdmin($datos)
    {
        // Datos específicos para Admin
        $datos['totalVentas'] = Pedido::sum('total_price');
        $datos['categoriasConMasProductos'] = CategoriaLocal::withCount('productos')
            ->orderBy('productos_count', 'desc')
            ->take(3)
            ->get();
        return $datos;
    }

    private function getDatosUser($user, $datos)
    {
        // Datos específicos para User
        $datos['misPedidos'] = Pedido::where('usuario_id', $user->id)->count();
        $datos['misProductos'] = Producto::where('usuario_id', $user->id)->count();
        $datos['totalCompras'] = Pedido::where('usuario_id', $user->id)->sum('total_price');
        return $datos;
    }
}