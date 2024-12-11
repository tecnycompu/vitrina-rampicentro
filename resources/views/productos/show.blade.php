@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-3xl font-bold mb-6">Detalles del Producto</h1>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        @if($producto->imagen)
            <img src="{{ asset($producto->imagen) }}" alt="{{ $producto->nombreProducto }}" class="w-full h-64 object-cover">
        @else
            <div class="w-full h-64 bg-gray-200 flex items-center justify-center">
                Sin imagen
            </div>
        @endif

        <div class="p-4">
            <h2 class="text-2xl font-semibold">{{ $producto->nombreProducto }}</h2>
            <p class="text-gray-600">{{ $producto->descripcion }}</p>
            <p class="text-lg font-bold text-blue-600">${{ number_format($producto->precio, 2) }}</p>

            @if(!$producto->esIntangible)
                <p class="text-sm text-gray-500">Stock: {{ $producto->stock }}</p>
            @endif

            <a href="{{ route('productos.edit', $producto->id) }}" 
               class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Editar Producto
            </a>
        </div>
    </div>
</div>
@endsection