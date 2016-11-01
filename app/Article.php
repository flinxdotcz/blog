<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{
  protected $fillable = [
    'name',
    'content',
    'published_at'
  ];

  protected $dates = [
    'published_at'
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

  public function scopePublished($query) {
    return $query->where('published_at', '<=', Carbon::now());
  }

  public function scopeUnpublished($query) {
    return $query->where('published_at', '>=', Carbon::now());
  }

  public function isPublished() {
    return $this->attributes['published_at'] <= Carbon::now();
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
