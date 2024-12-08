<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    //Relación con Producto:

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    //Relación con Pedido:

    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }
}
