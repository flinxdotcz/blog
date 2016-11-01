<?php

namespace App\Http\Middleware;

use Closure;

class RestrictedAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {

        if (!$request->user()->hasRole($role)) {
          return back()->with('error', 'Unauthorized action.');
        }

        return $next($request);
    }
}
