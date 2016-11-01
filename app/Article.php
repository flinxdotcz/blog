<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
  protected $fillable = [
    'name',
    'content'
  ];

  public function setExcerptAttribute($original) {
    $maxLength = 100;
    $startAt = 0;

    if(strlen($original) > $maxLength) {
    	$excerpt   = substr($original, $startAt, $maxLength-3);
    	$endAt = strrpos($excerpt, ' ');
    	$excerpt   = substr($excerpt, 0, $endAt);
    	$excerpt  .= '...';
    } else {
    	$excerpt = $original;
    }

    $this->attributes['excerpt'] = $excerpt;
  }

  public function thumbnailImage() {
    return $this->belongsTo('App\Image', 'thumbnail');
  }

  public function user() {
    return $this->belongsTo('App\User');
  }

  public function tags() {
    return $this->belongsToMany('App\Tag');
  }

}
