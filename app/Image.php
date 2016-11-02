<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Storage;

class Image extends Model
{

  public function uploadImage($image, $imageName) {
    return Storage::disk('s3')->put('images/' . $imageName, file_get_contents($image), 'public');
  }

  public function deleteImage($imageFullName) {
    return Storage::disk('s3')->delete('images/'.$imageFullName);
  }

  public function getFormattedTimestamp() {
    return str_replace([' ', ':', '#'],'-',Carbon::now()->toDateTimeString());
  }

  public function getSavedImageName($timestamp, $image) {
    return $timestamp . '-' . $image->getClientOriginalName();
  }

  public function getUrl($imageName) {
    return Storage::disk('s3')->url('images/' . $imageName);
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
