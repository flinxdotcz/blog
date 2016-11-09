<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  protected $fillable = [
    'name',
    'colour'
  ];

  public function articles() {
    return $this->belongsToMany('App\Article');
  }
}
