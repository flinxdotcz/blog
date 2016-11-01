<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Filesystem\Filesystem;

class Image extends Model
{

  public function uploadImage($image, $imageFullName, $storage) {
    $filesystem = new Filesystem;
    return $storage->disk('image')->put($imageFullName, $filesystem->get($image));
  }

  public function deleteImage($imageFullName, $storage) {
    return $storage->disk('image')->delete($imageFullName);
  }

  public function getFormattedTimestamp() {
    return str_replace([' ', ':'],'-',Carbon::now()->toDateTimeString());
  }

  public function getSavedImageName($timestamp, $image) {
    return $timestamp . '-' . $image->getClientOriginalName();
  }

  public function user() {
    return $this->belongsTo('App\User');
  }

  public function thumbnails() {
    return $this->hasMany('App\Article', 'thumbnail');
  }

  public function avatars() {
    return $this->hasMany('App\User', 'avatar');
  }
}
