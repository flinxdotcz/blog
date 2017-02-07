<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function hasPermissionTo($permission) {
      $permBitsSum = $this->role->permissions_sum;
      $bit = 1;
      $permIds = [];
      for ($i=0; $bit < $permBitsSum + 1; $i++) {
        $i === 0 ? $bit = 1 : $bit = $bit * 2;
        if ($permBitsSum & $bit) {
          array_push($permIds, $i + 1);
        }
      }
      $permission = \App\Permission::get()->where('name', '=', strtolower($permission))->first();
      return in_array($permission->id, $permIds);

    }

    public function hasRole($role) {
      return $this->role->name == $role;
    }

    public function role() {
      return $this->belongsTo('App\Role');
    }

    public function images() {
      return $this->hasMany('App\Image');
    }

    public function avatarImage() {
      return $this->belongsTo('App\Image', 'avatar');
    }

    public function articles() {
      return $this->hasMany('App\Article');
    }
}
