<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaLocalController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\OrderDetailsController;
use App\Http\Controllers\ProductoCategoriaController;
use App\Http\Controllers\RolPermisoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas para usuarios
Route::resource('usuarios', UsuarioController::class)->middleware('auth');

// Rutas para productos
Route::resource('productos', ProductoController::class)->middleware('auth');

// Rutas para categorías
Route::resource('categorias', CategoriaLocalController::class)->middleware('auth');

// Rutas para roles
Route::resource('roles', RolController::class)->middleware('auth');

// Rutas para permisos
Route::resource('permisos', PermisoController::class)->middleware('auth');

// Rutas para carritos
Route::resource('carritos', CarritoController::class)->middleware('auth');

// Rutas para pedidos
Route::resource('pedidos', PedidoController::class)->middleware('auth');

// Rutas para detalles de pedidos
Route::resource('order-details', OrderDetailsController::class)->middleware('auth');

// Rutas para relación producto-categoría
Route::resource('producto-categorias', ProductoCategoriaController::class)->middleware('auth');

// Rutas para relación rol-permiso
Route::resource('rol-permisos', RolPermisoController::class)->middleware('auth');

// Rutas del perfil del usuario (ya existente)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
