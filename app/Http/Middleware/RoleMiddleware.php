<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role, $permission = null)
    {
        if (($permission != null && $request->user()->can($permission)) or $request->user()->hasRole($role)) {
            return $next($request);
        }

        abort(404);
    }
}
