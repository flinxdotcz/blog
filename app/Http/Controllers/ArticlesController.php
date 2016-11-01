<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Article;

class ArticlesController extends Controller
{
  public function show($id) {
    $article = Article::findOrFail($id);
    return view('articles.show', compact('article'));
  }
}
