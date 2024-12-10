<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with('categoriaLocal')
            ->paginate(9);  // 9 productos por página
        return view('productos.index', compact('productos'));
    }

    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    public function store(Request $request)
    {
        // Crear un nuevo producto
        $producto = Producto::create($request->all());
        return response()->json($producto, 201);
    }

    public function update(Request $request, $id)
    {
        // Actualizar un producto existente
        $producto = Producto::findOrFail($id);
        $producto->update($request->all());
        return response()->json($producto);
    }

    public function destroy($id)
    {
        // Eliminar un producto
        Producto::destroy($id);
        return response()->json(null, 204);
    }
}
