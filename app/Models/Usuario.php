<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    // Especificar el nombre de la tabla
    protected $table = 'usuarios'; // Cambiar a 'usuarios' si tu tabla no sigue la convención de Laravel

    // Definir los campos que pueden ser asignados masivamente
    protected $fillable = ['email', 'contraseña', 'nombre', 'apellido', 'rol_id'];

    // Relación con el modelo Rol (un usuario tiene un rol)
    public function rol()
    {
        return $this->belongsTo(Rol::class);
    }

    // Relación con el modelo Producto (un usuario tiene muchos productos)
    public function productos()
    {
        return $this->hasMany(Producto::class);
    }

    // Relación con el modelo Carrito (un usuario tiene un carrito)
    public function carrito()
    {
        return $this->hasOne(Carrito::class);
    }

    // Relación con el modelo Pedido (un usuario tiene muchos pedidos)
    public function pedidos()
    {
        return $this->hasMany(Pedido::class);
    }
}
