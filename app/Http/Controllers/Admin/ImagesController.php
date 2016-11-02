<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Image;

class ImagesController extends Controller
{
  public function index() {
    if (Auth::user()->hasRole('admin')) {
      $images = Image::paginate(8);
    } else {
      $images = Auth::user()->images()->paginate(8);
    }
    return view('admin/images.index', compact('images'));
  }

  public function create() {
    $imageUpload = true;
    return view('admin/images.create', compact('imageUpload'));
  }

  public function store(Request $request) {
    $img = new Image;
    if ($request->isXmlHttpRequest()) {
      $image = $request->file('image');
      $timestamp = $img->getFormattedTimestamp();
      $imageName = $img->getSavedImageName($timestamp, $image);
      $imageUrl = $img->getUrl($imageName);
      $imageUploaded = $img->uploadImage($image, $imageName);
      if ($imageUploaded) {
        $img->url = $imageUrl;
        $img->name = $imageName;
        $img->user_id = $request->user()->id;
        $img->description = 'No description.';
        $img->save();
        $data = [
          'original_path' => $imageUrl,
          'image_id' => $img->id
        ];

        return json_encode( $data, JSON_UNESCAPED_SLASHES );
      }
      return false;
    }
  }

  public function destroy($id) {
    $image = Image::find($id);
    $image->deleteImage($image->name);
    $image->delete();
    return redirect()->action('\App\Http\Controllers\Admin\ImagesController@index')->with('alert', 'success|'.trans('admin/forms.images.delete.success'));
  }
}
