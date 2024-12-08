<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    //Relación con Usuario:

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
    
    //Relación con OrderDetails:

    public function detalles()
    {
        return $this->hasMany(OrderDetails::class);
    }
}
