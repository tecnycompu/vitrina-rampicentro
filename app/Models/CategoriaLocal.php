<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaLocal extends Model
{
    //Relación con Producto:

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
