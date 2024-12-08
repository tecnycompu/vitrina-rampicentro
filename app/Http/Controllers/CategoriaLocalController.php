<?php

namespace App\Http\Controllers;

use App\Models\CategoriaLocal;
use Illuminate\Http\Request;

class CategoriaLocalController extends Controller
{
    public function index()
    {
        return CategoriaLocal::all();
    }

    public function show($id)
    {
        return CategoriaLocal::findOrFail($id);
    }

    public function store(Request $request)
    {
        return CategoriaLocal::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $categoria = CategoriaLocal::findOrFail($id);
        $categoria->update($request->all());
        return $categoria;
    }

    public function destroy($id)
    {
        CategoriaLocal::destroy($id);
        return response()->json(null, 204);
    }
}
