<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\CategoriaLocal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    // Mostrar la lista de productos
    public function index()
{
    // Recupera los productos con paginación (10 productos por página, por ejemplo)
    $productos = Producto::paginate(10);

    // Devuelve la vista con los productos paginados
    return view('productos.index', compact('productos'));
}

    // Mostrar el formulario para crear un nuevo producto
    public function create()
    {
        // Obtener las categorías para el formulario de creación
        $categorias = CategoriaLocal::all();

        return view('productos.create', compact('categorias'));
    }

    // Almacenar un nuevo producto
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombreProducto' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'nullable|integer|min:0',
            'categoria_local_id' => 'required|exists:categoria_locals,id',
            'imagen' => 'nullable|image|max:2048',
        ]);

        // Obtener el usuario autenticado
        $usuario = Auth::user();  // Usando el Facade Auth
        $validated['usuario_id'] = $usuario->id;

        // Subir imagen si está presente
        if ($request->hasFile('imagen')) {
            $validated['imagen'] = $request->file('imagen')->store('productos', 'public');
        }

        // Crear el producto
        Producto::create($validated);

        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
    }

    // Mostrar los detalles de un producto
    public function show($id)
    {
        // Recuperar el producto por su ID
        $producto = Producto::findOrFail($id);

        return view('productos.show', compact('producto'));
    }

    // Mostrar el formulario para editar un producto
    public function edit($id)
    {
        // Recuperar el producto y las categorías
        $producto = Producto::findOrFail($id);
        $categorias = CategoriaLocal::all();

        return view('productos.edit', compact('producto', 'categorias'));
    }

    // Actualizar un producto
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nombreProducto' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'nullable|integer|min:0',
            'categoria_local_id' => 'required|exists:categoria_locals,id',
            'imagen' => 'nullable|image|max:2048',
        ]);

        // Obtener el producto y actualizarlo
        $producto = Producto::findOrFail($id);

        // Subir la imagen si está presente
        if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior si existe
            if ($producto->imagen) {
                Storage::disk('public')->delete($producto->imagen);
            }

            $validated['imagen'] = $request->file('imagen')->store('productos', 'public');
        }

        // Actualizar el producto
        $producto->update($validated);

        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.');
    }

    // Eliminar un producto
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);

        // Eliminar la imagen si existe
        if ($producto->imagen) {
            Storage::disk('public')->delete($producto->imagen);
        }

        // Eliminar el producto
        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente.');
    }
}
