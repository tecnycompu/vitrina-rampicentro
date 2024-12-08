<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductoCategoria extends Model
{
    //Relación con Producto:

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    //Relación con CategoriaLocal:

    public function categoriaLocal()
    {
        return $this->belongsTo(CategoriaLocal::class);
    }
}
