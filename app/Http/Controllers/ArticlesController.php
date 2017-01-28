<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Article;

use App\Tag;

class ArticlesController extends Controller
{

  public function __construct() {
    \Carbon\Carbon::setlocale(env('APP_LOCALE', 'en'));
  }

  public function show($id) {
    $ajax = true;
    if (!is_numeric($id)) {
      $article = Article::where('slug', '=', $id)->published()->firstOrFail();
    } else {
      $article = Article::published()->findOrFail($id);
    }
    $tags = Tag::get();
    $title = $article->name;
    $currentOption = [
      'name' => 'Article',
      'routeName' => 'article-edit',
      'id' => $article->id
    ];
    return view('article-single', compact('currentOption','title','tags','article','ajax'));
  }

  public function addHit(Request $request, $id) {
    if ($request->ajax()) {
      $article = Article::findOrFail($id);
      $article->hits++;
      $article->save();
      return response()->json('ok', 200);
    }
  }

  public function getFeed(Request $request) {
    if ($request->ajax()) {
      $articles = Article::take(5)->orderBy('published_at', 'desc')->published()->get();
      $data = clone $articles;
      foreach ($data as $article) {
        $article->replicate();
        $article->url = $request->url . '/article/' . $article->slug;
        $article->thumbnail = !is_null($article->thumbnailImage) ? $article->thumbnailImage->url : '';
      }
      return response()->json($data, 200);
    }
  }
}
