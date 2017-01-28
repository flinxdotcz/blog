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
    $main = Article::published()->orderBy('created_at', 'desc')->firstOrFail();
    $latest = Article::published()->take(10)->orderBy('created_at', 'desc')->get();
    $popular = Article::published()->take(10)->orderBy('created_at', 'desc')->get();
    return view('home', compact('tags', 'main', 'latest', 'popular'));
  }
}
