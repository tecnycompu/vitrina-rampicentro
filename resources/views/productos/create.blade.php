@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-3xl font-bold mb-6">Crear Nuevo Producto</h1>

    <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8">
        @csrf

        <div class="mb-4">
            <label for="nombreProducto" class="block text-gray-700 font-bold mb-2">Nombre del Producto</label>
            <input type="text" name="nombreProducto" id="nombreProducto" 
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                   value="{{ old('nombreProducto') }}" required>
            @error('nombreProducto')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="descripcion" class="block text-gray-700 font-bold mb-2">Descripción</label>
            <textarea name="descripcion" id="descripcion" rows="4"
                      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('descripcion') }}</textarea>
            @error('descripcion')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="precio" class="block text-gray-700 font-bold mb-2">Precio</label>
            <input type="number" name="precio" id="precio" step="0.01" 
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                   value="{{ old('precio') }}" required>
            @error('precio')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="categoria_local_id" class="block text-gray-700 font-bold mb-2">Categoría</label>
            <select name="categoria_local_id" id="categoria_local_id" 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ old('categoria_local_id') == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nombreCategoria }}
                    </option>
                @endforeach
            </select>
            @error('categoria_local_id')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="imagen" class="block text-gray-700 font-bold mb-2">Imagen</label>
            <input type="file" name="imagen" id="imagen"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('imagen')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" 
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Guardar Producto
            </button>
        </div>
    </form>
</div>
@endsection
