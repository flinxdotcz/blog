<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Article;

class HomeController extends Controller
{
  public function index() {
    $ajax = true;
    $main = Article::published()->firstOrFail();
    $articles = Article::published()->take(9)->orderBy('created_at', 'desc')->get();
    return view('home', compact('ajax', 'main', 'articles'));
  }
}
