<?php

namespace App\Http\Controllers;

use App\Models\CategoriaLocal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CategoriaLocalController extends Controller
{
    public function index()
    {
        $categorias = CategoriaLocal::paginate(8);
        return view('categorias.index', compact('categorias'));
    }

    public function show(CategoriaLocal $categoria)
    {
        // Fetch productos for this category
        $productos = $categoria->productos()->paginate(9);
        return view('categorias.show', compact('categoria', 'productos'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombreCategoria' => 'required|string|max:255|unique:categoria_locals,nombreCategoria',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle image upload if exists
        if ($request->hasFile('imagen')) {
            $imagePath = $request->file('imagen')->store('categorias', 'public');
            $validated['imagen'] = $imagePath;
        }

        CategoriaLocal::create($validated);

        return redirect()->route('categorias.index')
            ->with('success', 'Categoría creada exitosamente');
    }

    public function edit(CategoriaLocal $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, CategoriaLocal $categoria)
    {
        $validated = $request->validate([
            'nombreCategoria' => 'required|string|max:255|unique:categoria_locals,nombreCategoria,'.$categoria->id,
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle image upload if exists
        if ($request->hasFile('imagen')) {
            // Delete old image if exists
            if ($categoria->imagen) {
                Storage::disk('public')->delete($categoria->imagen);
            }
            
            $imagePath = $request->file('imagen')->store('categorias', 'public');
            $validated['imagen'] = $imagePath;
        }

        $categoria->update($validated);

        return redirect()->route('categorias.index')
            ->with('success', 'Categoría actualizada exitosamente');
    }

    public function destroy(CategoriaLocal $categoria)
    {
        // Delete associated image if exists
        if ($categoria->imagen) {
            Storage::disk('public')->delete($categoria->imagen);
        }

        $categoria->delete();

        return redirect()->route('categorias.index')
            ->with('success', 'Categoría eliminada exitosamente');
    }
}