@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-3xl font-bold mb-6">Editar Producto</h1>

    <form action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nombreProducto" class="block text-gray-700 font-bold mb-2">Nombre del Producto</label>
            <input type="text" name="nombreProducto" id="nombreProducto" 
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                   value="{{ old('nombreProducto', $producto->nombreProducto) }}" required>
            @error('nombreProducto')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <!-- Similar al formulario de creación, pero prellena los datos -->
        <!-- Reutiliza las secciones de create.blade.php con modificaciones -->
    </form>
</div>
@endsection
