<?php

namespace App\Http\Middleware;

use Closure;

use App\Permission;

class RoleAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $action)
    {
        if (!empty($action)) {
          $permBitsSum = $request->user()->role->permissions_sum;
          $bit = 1;
          $permIds = [];
          for ($i=0; $bit < $permBitsSum + 1; $i++) {
            $i === 0 ? $bit = 1 : $bit = $bit * 2;
            if ($permBitsSum & $bit) {
              array_push($permIds, $i + 1);
            }
          }
          $permission = Permission::get()->where('name', '=', strtolower($action))->first();
          if (is_null($permission) || !in_array($permission->id, $permIds)) {
            abort('404');
          }
        }

        return $next($request);
    }
}
