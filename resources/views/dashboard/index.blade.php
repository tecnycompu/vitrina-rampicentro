@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Panel de Control - Vitrina Rampicentro</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        {{-- Statistics Cards --}}
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Usuarios Registrados</h2>
            <p class="text-3xl font-bold text-blue-600">{{ $datos['usuarios'] }}</p>
        </div>

        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Total de Productos</h2>
            <p class="text-3xl font-bold text-green-600">{{ $datos['productos'] }}</p>
        </div>

        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Pedidos Realizados</h2>
            <p class="text-3xl font-bold text-purple-600">{{ $datos['pedidos'] }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
        {{-- Recent Orders --}}
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Pedidos Recientes</h2>
            @foreach($recentPedidos as $pedido)
                <div class="border-b py-2">
                    <p>Pedido #{{ $pedido->id }} - {{ $pedido->usuario->nombre }}</p>
                    <p class="text-sm text-gray-600">Total: ${{ $pedido->total_price }}</p>
                </div>
            @endforeach
        </div>

        {{-- Recent Products --}}
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Productos Recientes</h2>
            @foreach($recentProductos as $producto)
                <div class="border-b py-2">
                    <p>{{ $producto->nombreProducto }}</p>
                    <p class="text-sm text-gray-600">
                        Categoría: {{ $producto->categoriaLocal->nombreCategoria }} 
                        | Precio: ${{ $producto->precio }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection