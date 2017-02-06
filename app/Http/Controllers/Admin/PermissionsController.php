<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;

use App\Http\Requests;

class PermissionsController extends Controller
{
    public function index() {
      $roles = Role::where('title', '!=', 'owner')->get();
      foreach ($roles as $role) {
        $permBitsSum = $role->permissions_sum;
        $bit = 1;
        $permissionIds = [];
        for ($i=0; $bit < $permBitsSum + 1; $i++) {
          $i === 0 ? $bit = 1 : $bit = $bit * 2;
          if ($permBitsSum & $bit) {
            array_push($permissionIds, $i + 1);
          }
        }
        $role->permissionIds = $permissionIds;
      }
      $permissions = Permission::all();
      return view('admin.permissions.index', compact('roles', 'permissions'));
    }

    public function update(Request $request) {
      //
    }
}
