<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|array  $roles
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $user = Auth::user();

        // Convierte $roles a un array si es un string
        $roles = is_array($roles) ? $roles : [$roles];

        // Verifica si el rol del usuario está en los roles permitidos
        if (!in_array($user->rol->nombreRol, $roles)) {
            // Puedes personalizar la redirección o mostrar un mensaje de error
            return redirect('dashboard')->with('error', 'No tienes permiso para acceder a esta página.');
        }

        return $next($request);
    }
}