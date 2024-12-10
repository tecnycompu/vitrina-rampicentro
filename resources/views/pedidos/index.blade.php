@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-3xl font-bold mb-6">Mis Pedidos</h1>

    <div class="bg-white shadow-md rounded-lg">
        <table class="w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left">ID Pedido</th>
                    <th class="px-4 py-2 text-left">Fecha</th>
                    <th class="px-4 py-2 text-left">Total</th>
                    <th class="px-4 py-2 text-left">Estado</th>
                    <th class="px-4 py-2 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pedidos as $pedido)
                    <tr class="border-b">
                        <td class="px-4 py-2">#{{ $pedido->id }}</td>
                        <td class="px-4 py-2">{{ $pedido->fecha->format('d/m/Y') }}</td>
                        <td class="px-4 py-2">${{ number_format($pedido->total_price, 2) }}</td>
                        <td class="px-4 py-2">
                            <span class="{{ $pedido->status ? 'text-green-600' : 'text-yellow-600' }}">
                                {{ $pedido->status ? 'Completado' : 'Pendiente' }}
                            </span>
                        </td>
                        <td class="px-4 py-2">
                            <a href="{{ route('pedidos.show', $pedido->id) }}" 
                               class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                Detalles
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $pedidos->links() }}
    </div>
</div>
@endsection