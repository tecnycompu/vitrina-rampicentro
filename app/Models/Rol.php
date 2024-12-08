<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    //Relación con Usuario:

    public function usuarios()
    {
        return $this->hasMany(Usuario::class);
    }
    //Relación con Permiso (muchos a muchos):

    public function permisos()
    {
        return $this->belongsToMany(Permiso::class, 'rol_permisos');
    }
}
