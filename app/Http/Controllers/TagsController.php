<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Tag;

class TagsController extends Controller
{
  public function index() {
    $tags = Tag::all();
    return view('tags.index', compact('tags'));
  }

  public function show($id) {
    $tag = Tag::findOrFail($id);
    $articles = $tag->paginate(5);
    return view('tags.show', compact('tag','articles'));
  }
}
