<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    //Relación con Rol (muchos a muchos):

    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'rol_permisos');
    }
}
