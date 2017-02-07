<?php

namespace App\Http\Middleware;

use Closure;
use DB;

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
    public function handle($request, Closure $next, $action, $table = null)
    {
        $owner = false;
        if (!is_null($request->id) && !is_null($table)) {
          $resource = DB::table(strtolower($table))->where('id', intval($request->id))->first();
          if (!is_null($resource)) {
            if (property_exists($resource, 'user_id')) {
              if ($resource->user_id === $request->user()->id) {
                if (strtolower($table) === 'user-delete') {
                  back()->with('alert', 'warning|'.trans('admin/forms.errors.unauthorized'));
                } else {
                  $owner = true;
                }
              }
            } elseif (intval($request->id) === $request->user()->id) {
              $owner = true;
            } else {
             $owner = false;
            }
          }
        }
        if (!$owner) {
          if (!empty($action) && !is_null($request->user())) {
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
              return back()->with('alert', 'warning|'.trans('admin/forms.errors.unauthorized'));
            }
          }
        }
        return $next($request);
    }
}
