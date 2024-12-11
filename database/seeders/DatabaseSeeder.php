<?php

namespace Database\Seeders;

use App\Models\User; // Asegúrate de importar User
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([
            RolSeeder::class,           // Roles primero
            PermisoSeeder::class,       // Luego los permisos
            UserSeeder::class, // Agregar aquí el seeder de usuarios
            CategoriaLocalSeeder::class, // Categorías después de usuarios y permisos
            ProductoSeeder::class,      // Productos después de categorías y usuarios
            CarritoSeeder::class,       // Carritos después de usuarios
            PedidoSeeder::class,        // Pedidos después de usuarios
            OrderDetailsSeeder::class,  // Order details después de productos y pedidos
            ProductoCategoriaSeeder::class, // Producto-Categorías después de productos y categorías
            RolPermisoSeeder::class,    // Rol-Permiso al final, ya que depende de roles y permisos
        ]);
    }
}
