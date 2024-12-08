<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function index()
    {
        // Obtener todos los usuarios
        $usuarios = Usuario::all();
        return response()->json($usuarios);
    }

    public function show($id)
    {
        // Obtener un usuario por su ID
        $usuario = Usuario::findOrFail($id);
        return response()->json($usuario);
    }

    public function store(Request $request)
    {
        // Crear un nuevo usuario
        $usuario = Usuario::create($request->all());
        return response()->json($usuario, 201);
    }

    public function update(Request $request, $id)
    {
        // Actualizar un usuario existente
        $usuario = Usuario::findOrFail($id);
        $usuario->update($request->all());
        return response()->json($usuario);
    }

    public function destroy($id)
    {
        // Eliminar un usuario
        Usuario::destroy($id);
        return response()->json(null, 204);
    }
}
