@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">
        @switch($userRole)
            @case('Admin')
                Panel de Administración - Vitrina Rampicentro
                @break
            @case('User')
                Mi Panel Personal - Vitrina Rampicentro
                @break
            @default
                Panel de Control
        @endswitch
    </h1>

    @switch($userRole)
        @case('Admin')
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white shadow rounded-lg p-6">
                    <h2 class="text-xl font-semibold mb-4">Usuarios Registrados</h2>
                    <p class="text-3xl font-bold text-blue-600">{{ $datos['usuarios'] }}</p>
                </div>
                <div class="bg-white shadow rounded-lg p-6">
                    <h2 class="text-xl font-semibold mb-4">Total de Productos</h2>
                    <p class="text-3xl font-bold text-green-600">{{ $datos['productos'] }}</p>
                </div>
                <div class="bg-white shadow rounded-lg p-6">
                    <h2 class="text-xl font-semibold mb-4">Ventas Totales</h2>
                    <p class="text-3xl font-bold text-purple-600">${{ number_format($datos['totalVentas'], 2) }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                <div class="bg-white shadow rounded-lg p-6">
                    <h2 class="text-xl font-semibold mb-4">Pedidos Recientes</h2>
                    @foreach($recentPedidos as $pedido)
                        <div class="border-b py-2">
                            <p>Pedido #{{ $pedido->id }} - {{ $pedido->usuario->name }}</p>
                            <p class="text-sm text-gray-600">Total: ${{ $pedido->total_price }}</p>
                        </div>
                    @endforeach
                </div>
                <div class="bg-white shadow rounded-lg p-6">
                    <h2 class="text-xl font-semibold mb-4">Categorías con Más Productos</h2>
                    @foreach($datos['categoriasConMasProductos'] as $categoria)
                        <div class="border-b py-2">
                            <p>{{ $categoria->nombreCategoria }}</p>
                            <p class="text-sm text-gray-600">Productos: {{ $categoria->productos_count }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            @break

        @case('User')
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white shadow rounded-lg p-6">
                    <h2 class="text-xl font-semibold mb-4">Mis Pedidos</h2>
                    <p class="text-3xl font-bold text-blue-600">{{ $datos['misPedidos'] }}</p>
                </div>
                <div class="bg-white shadow rounded-lg p-6">
                    <h2 class="text-xl font-semibold mb-4">Mis Productos</h2>
                    <p class="text-3xl font-bold text-green-600">{{ $datos['misProductos'] }}</p>
                </div>
                <div class="bg-white shadow rounded-lg p-6">
                    <h2 class="text-xl font-semibold mb-4">Total Comprado</h2>
                    <p class="text-3xl font-bold text-purple-600">${{ number_format($datos['totalCompras'], 2) }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                <div class="bg-white shadow rounded-lg p-6">
                    <h2 class="text-xl font-semibold mb-4">Mis Pedidos Recientes</h2>
                    @foreach($recentPedidos as $pedido)
                        <div class="border-b py-2">
                            <p>Pedido #{{ $pedido->id }}</p>
                            <p class="text-sm text-gray-600">Total: ${{ $pedido->total_price }}</p>
                        </div>
                    @endforeach
                </div>
                <div class="bg-white shadow rounded-lg p-6">
                    <h2 class="text-xl font-semibold mb-4">Mis Productos Recientes</h2>
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
            @break

        @default
            <div class="bg-white shadow rounded-lg p-6">
                <p>No tiene permisos para ver el dashboard.</p>
            </div>
    @endswitch
</div>
@endsection