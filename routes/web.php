<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoriaLocalController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');  // Página de bienvenida
});

// Dashboard con validación de roles
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified', 'role:Admin,User'])  // Solo Admin y User pueden acceder
    ->name('dashboard');

// Rutas para el perfil del usuario
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas de recursos para categorías (solo para Admin)
Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::resource('categorias', CategoriaLocalController::class);
    Route::resource('productos', ProductoController::class);
});

require __DIR__.'/auth.php';  // Rutas de autenticación generadas por Laravel Breeze