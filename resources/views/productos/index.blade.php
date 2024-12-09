@extends('layouts.app')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    @foreach($productos as $producto)
        <div class="bg-white rounded-lg shadow-md p-4">
            <img src="{{ $producto->imagen }}" alt="{{ $producto->nombreProducto }}" class="w-full h-48 object-cover">
            <h2 class="text-xl font-bold mt-2">{{ $producto->nombreProducto }}</h2>
            <p class="text-gray-600">{{ $producto->descripcion }}</p>
            <div class="flex justify-between items-center mt-4">
                <span class="text-rampi-primary font-bold">${{ number_format($producto->precio, 2) }}</span>
                <button class="bg-rampi-secondary text-white px-4 py-2 rounded">
                    Agregar al Carrito
                </button>
            </div>
        </div>
    @endforeach
</div>
@endsection