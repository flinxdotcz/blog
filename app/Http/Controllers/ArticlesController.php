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

  public function show(Request $request, $id) {
    if (!$request->session()->exists($id)) {
      if (!is_numeric($id)) {
        $hit = Article::where('slug', '=', $id)->firstOrFail();
      } else {
        $hit = Article::findOrFail($id);
      }
      $hit->hits++;
      $hit->save();
      $request->session()->put($id);
    }
    $ajax = true;
    if (!is_numeric($id)) {
      $article = Article::where('slug', '=', $id)->published()->firstOrFail();
    } else {
      $article = Article::published()->findOrFail($id);
    }
    $tags = Tag::displayed()->orderBy('order')->get();
    $title = $article->name;
    $currentOption = [
      'name' => 'Article',
      'routeName' => 'article-edit',
      'id' => $article->id
    ];
    return view('article-single', compact('currentOption','title','tags','article','ajax'));
  }

  public function getFeed(Request $request) {
    if ($request->ajax()) {
      $articles = Article::published()->take(5)->where('hits', '>', 0)->orderBy('hits', 'desc')->get();
      $data = clone $articles;
      foreach ($data as $article) {
        $article->replicate();
        $article->url = $request->url . '/article/' . $article->slug;
        $article->thumbnail = !is_null($article->thumbnailImage) ? $article->thumbnailImage->url : '';
      }
      return response()->json($data, 200);
    }
  }
  public function setLike(Request $request) {
    $id = $request->id;
    if ($request->ajax()) {
      if (!$request->hasCookie('articleLike-' . $id)) {
        $article = Article::findOrFail($id);
        $article->likes++;
        $article->save();
        return response($article->likes)->cookie('articleLike-' . $id, true, time() + (365 * 24 * 60 * 60));
      } else {
        return response('Cannot like this item.', 501);
      }
    }
  }
}
