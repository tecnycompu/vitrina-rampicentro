@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-3xl font-bold mb-6">Catálogo de Productos</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($productos as $producto)
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                @if($producto->imagen)
                    <img src="{{ asset($producto->imagen) }}" alt="{{ $producto->nombreProducto }}" class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                        Sin imagen
                    </div>
                @endif
                
                <div class="p-4">
                    <h2 class="text-xl font-semibold mb-2">{{ $producto->nombreProducto }}</h2>
                    <p class="text-gray-600 mb-2">{{ $producto->descripcion }}</p>
                    
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-bold text-blue-600">${{ number_format($producto->precio, 2) }}</span>
                        
                        @if(!$producto->esIntangible)
                            <span class="text-sm text-gray-500">Stock: {{ $producto->stock }}</span>
                        @endif
                    </div>
                    
                    <div class="mt-4 flex space-x-2">
                        <a href="{{ route('productos.show', $producto->id) }}" 
                           class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                            Ver Detalles
                        </a>
                        @can('create', App\Models\Pedido::class)
                            <button class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
                                Comprar
                            </button>
                        @endcan
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $productos->links() }}
    </div>
</div>
@endsection