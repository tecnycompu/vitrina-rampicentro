@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bienvenido al Dashboard</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Usuarios Registrados</h5>
                    <p class="card-text">{{ $datos['usuarios'] }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Productos</h5>
                    <p class="card-text">{{ $datos['productos'] }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Pedidos</h5>
                    <p class="card-text">{{ $datos['pedidos'] }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
