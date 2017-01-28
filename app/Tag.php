<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  protected $fillable = [
    'name',
    'colour',
    'slug'
  ];

  public function setSlugAttribute($id) {
    if (!is_null($id)) {
      $id = $id . '-';
    }
    return $this->attributes['slug'] = $id . str_slug($this->name);
  }

  public function scopeDisplayed($query) {
    return $query->where('isDisplayed', '=', 1);
  }

  public function articles() {
    return $this->belongsToMany('App\Article');
  }
}
