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
    $latest = Article::published()->take(10)->orderBy('published_at', 'desc')->where('id', '!=', $main->id)->get();
    $trending = Article::published()->take(5)->where('hits', '>', 0)->where('id', '!=', $main->id)->orderBy('hits', 'desc')->get();
    $popular = Article::published()->take(5)->where('likes', '>', 0)->where('id', '!=', $main->id)->orderBy('likes', 'desc')->get();
    return view('home', compact('tags', 'main', 'latest', 'trending', 'popular'));
  }
}
