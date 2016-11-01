<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class RestrictedAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role, $resource = null)
    {
      if ($resource) {
        if ($resource == 'users') {
          if ($request->user()->id != $request->id) {
            if (User::find($request->id)->role->name == 'admin') {
              if (!$request->user()->hasRole($role)) {
                return back()->with('alert', 'warning|'.trans('admin/forms.errors.unauthorized'));
              }
              return back()->with('alert', 'warning|'.trans('admin/forms.errors.deleting_admin'));
            }
          } else {
            return back()->with('alert', 'warning|'.trans('admin/forms.errors.deleting_self'));
          }
        } else {
          if (!$request->user()->$resource->find($request->id)) {
            if (!$request->user()->hasRole($role)) {
              return back()->with('alert', 'warning|'.trans('admin/forms.errors.unauthorized'));
            }
          }
        }
      } else {
        if (!$request->user()->hasRole($role)) {
          return back()->with('alert', 'warning|'.trans('admin/forms.errors.unauthorized'));
        }
      }
      return $next($request);
      dd($resource);
    }
}
