<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Muestra el panel principal del Dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Aquí puedes pasar datos al dashboard, como estadísticas o gráficos
        $datos = [
            'usuarios' => 100, // Ejemplo: total de usuarios
            'productos' => 50, // Ejemplo: total de productos
            'pedidos' => 20,   // Ejemplo: total de pedidos
        ];

        // Retorna la vista del dashboard
        return view('dashboard.index', compact('datos'));
    }
}
