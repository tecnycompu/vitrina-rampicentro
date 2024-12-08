public function handle($request, Closure $next, ...$roles)
{
    if (!$request->user() || !in_array($request->user()->rol->nombreRol, $roles)) {
        abort(403, 'Acceso no autorizado');
    }
    return $next($request);
}
