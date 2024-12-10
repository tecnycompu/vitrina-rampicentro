@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-3xl font-bold mb-6">Categorías de Productos</h1>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        @foreach($categorias as $categoria)
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                @if($categoria->imagen)
                    <img src="{{ asset($categoria->imagen) }}" alt="{{ $categoria->nombreCategoria }}" class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                        Sin imagen
                    </div>
                @endif
                
                <div class="p-4">
                    <h2 class="text-xl font-semibold mb-2">{{ $categoria->nombreCategoria }}</h2>
                    <p class="text-gray-600 mb-4">{{ $categoria->descripcion ?? 'Sin descripción' }}</p>
                    
                    <a href="{{ route('categorias.show', $categoria->id) }}" 
                       class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                        Ver Productos
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $categorias->links() }}
    </div>
</div>
@endsection