<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Tag;

class TagsController extends Controller
{
  public function show($id) {
    $ajax = true;
    $tags = Tag::get();
    if (!is_numeric($id)) {
      $tag = Tag::where('slug', '=', $id)->firstOrFail();
    } else {
      $tag = Tag::findOrFail($id);
    }
    $title = $tag->name;
    return view('list', compact('tags', 'title', 'tag', 'ajax'));
  }
}
