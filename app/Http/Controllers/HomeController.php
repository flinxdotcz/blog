<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Tag;

use App\Article;

class HomeController extends Controller
{
  public function index() {
    $tags = Tag::displayed()->orderBy('order')->get();
    $main = Article::published()->orderBy('published_at', 'desc')->firstOrFail();
    $latest = Article::published()->take(10)->orderBy('published_at', 'desc')->skip(1)->get();
    $trending = Article::published()->take(10)->where('hits', '>', 0)->orderBy('hits', 'desc')->get();
    return view('home', compact('tags', 'main', 'latest', 'trending'));
  }
}
