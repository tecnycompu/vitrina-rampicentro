<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoriaLocalController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');  // Página de bienvenida
});

// Dashboard: Página principal para usuarios autenticados
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])  // Se requiere autenticación y verificación de correo
    ->name('dashboard');

// Rutas para el perfil del usuario
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');  // Editar perfil
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');  // Actualizar perfil
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');  // Eliminar perfil
});

// Rutas de recursos para las categorías y productos
Route::middleware(['auth'])->group(function () {
    Route::resource('categorias', CategoriaLocalController::class);  // Rutas CRUD para categorías
    Route::resource('productos', ProductoController::class);  // Rutas CRUD para productos
});

require __DIR__.'/auth.php';  // Rutas de autenticación generadas por Laravel Breeze
