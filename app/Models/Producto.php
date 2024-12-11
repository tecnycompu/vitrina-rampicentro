<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    // Campos protegidos para asignación masiva
    protected $fillable = [
        'nombreProducto',
        'descripcion',
        'precio',
        'stock',
        'categoria_local_id',
        'imagen',
        'usuario_id',
    ];

    // Relación con Usuario (vendedor)
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con CategoriaLocal
    public function categoriaLocal()
    {
        return $this->belongsTo(CategoriaLocal::class);
    }

    // Relación con OrderDetails
    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class);
    }

    // Relación con ProductoCategoria
    public function categorias()
    {
        return $this->belongsToMany(CategoriaLocal::class, 'producto_categorias');
    }
}
