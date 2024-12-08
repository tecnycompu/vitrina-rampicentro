<?php

namespace App\Http\Controllers;

use App\Models\Permiso;
use Illuminate\Http\Request;

class PermisoController extends Controller
{
    public function index()
    {
        return Permiso::all();
    }

    public function show($id)
    {
        return Permiso::findOrFail($id);
    }

    public function store(Request $request)
    {
        return Permiso::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $permiso = Permiso::findOrFail($id);
        $permiso->update($request->all());
        return $permiso;
    }

    public function destroy($id)
    {
        Permiso::destroy($id);
        return response()->json(null, 204);
    }
}
