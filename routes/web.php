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
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Agrupación de rutas protegidas con el middleware 'auth'
Route::middleware(['auth'])->group(function () {
    // Rutas de recursos
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('productos', ProductoController::class);
    Route::resource('categorias', CategoriaLocalController::class);
    Route::resource('roles', RolController::class);
    Route::resource('permisos', PermisoController::class);
    Route::resource('carritos', CarritoController::class);
    Route::resource('pedidos', PedidoController::class);
    Route::resource('order-details', OrderDetailsController::class);
    Route::resource('producto-categorias', ProductoCategoriaController::class);
    Route::resource('rol-permisos', RolPermisoController::class);

    // Rutas específicas
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//Route::resource('productos', ProductoController::class);


require __DIR__.'/auth.php';
