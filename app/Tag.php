<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  protected $fillable = [
    'name',
    'colour'
  ];

  public function scopeDisplayed($query) {
    return $query->where('isDisplayed', '=', 1);
  }

  public function articles() {
    return $this->belongsToMany('App\Article');
  }
}
