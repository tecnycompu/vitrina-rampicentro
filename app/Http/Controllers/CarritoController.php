<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    public function index()
    {
        return Carrito::all();
    }

    public function show($id)
    {
        return Carrito::findOrFail($id);
    }

    public function store(Request $request)
    {
        return Carrito::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $carrito = Carrito::findOrFail($id);
        $carrito->update($request->all());
        return $carrito;
    }

    public function destroy($id)
    {
        Carrito::destroy($id);
        return response()->json(null, 204);
    }
}
