<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    //Relación con Usuario:

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
