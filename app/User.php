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
