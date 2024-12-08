<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    // Especificar que la tabla se llama 'roles' (no 'rols')
    protected $table = 'roles';  // Asegúrate de que esta propiedad está definida correctamente

    // Definir las columnas 'fillable'
    protected $fillable = ['nombreRol'];
}
