<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Pedido;

class PedidoPolicy
{
    /**
     * Determine if the given pedido can be viewed by the user.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pedido  $pedido
     * @return bool
     */
    public function view(User $user, Pedido $pedido)
    {
        // Solo puede ver el pedido el usuario que lo hizo
        return $user->id === $pedido->usuario_id;
    }

    // Otros métodos como update, delete, etc.
}
