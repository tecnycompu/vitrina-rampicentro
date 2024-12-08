<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
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
