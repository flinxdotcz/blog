<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Tag;

use App\Article;

class ArticlesController extends Controller
{

  public function index(Request $request) {
    if (!$request['sortBy']) {
      $sortBy = 'updated_at';
      $desc = false;
    } else {
      $sortBy = $request['sortBy'];
      $desc = !$request['desc'];
    }
    $articles = Article::orderBy($sortBy, $desc ? 'asc' : 'desc')->paginate(10);
    return view('admin.articles.index', compact('articles', 'desc'));
  }

  public function show($id) {
    $article = Article::findOrFail($id);
    return view('admin.articles.show', compact('article'));
  }

  public function edit($id) {
    $article = Article::findOrFail($id);
    $tags = Tag::pluck('name', 'id');
    $richEditor = true;
    $imageUpload = true;
    return view('admin.articles.edit', compact('article', 'tags', 'richEditor', 'imageUpload'));
  }

  public function create() {
    $tags = Tag::pluck('name', 'id');
    $richEditor = true;
    return view('admin.articles.create', compact('tags', 'richEditor'));
  }

  public function update(Request $request, $id) {
    $article = Article::findOrFail($id);
    $article->fill($request->all());
    // dd($request->all());
    $article->save();
    return redirect()->action('\App\Http\Controllers\Admin\ArticlesController@show', ['id' => $article->id])->with('alert', 'success|'.trans('admin/forms.articles.update.success'));
  }

  public function store(Request $request, $id = null) {
    $this->validate($request, [
      'name' => 'required|min:5|max:65',
      'tags' => 'required|min:1',
      'content' => 'required|min:20|max:9000'
    ]);
    if (is_null($id)) {
      $article = new Article;
      $article->created_at = \Carbon\Carbon::now();
      $article->updated_at = \Carbon\Carbon::now();
      $article->user_id = \Auth::user()->id;
      $statusMessage = trans('admin/forms.articles.create.status');
    } else {
      $article = Article::findOrFail($id);
      $article->updated_at = \Carbon\Carbon::now();
      $statusMessage = trans('admin/forms.articles.edit.status');
    }
    if (!empty($request->input('image-reference'))) {
      $article->thumbnail = $request->input('image-reference');
    }
    $article->name = $request->input('name');
    $article->published_at = $request->input('published_at');
    $article->auto_publish = $article->published_at <= \Carbon\Carbon::now();
    $article->force_publish != $article->published_at <= \Carbon\Carbon::now();
    $article->content = $request->input('content');
    $article->excerpt = $request->input('content');
    $article->save();
    $article->tags()->sync($request->input('tags'));
    return redirect()->action('\App\Http\Controllers\Admin\ArticlesController@show', ['id' => $article->id])->with('alert', 'success|'.$statusMessage);
  }

  public function destroy($id) {
    Article::destroy($id);
    return redirect()->action('\App\Http\Controllers\Admin\ArticlesController@index')->with('alert', 'success|'.trans('admin/forms.articles.delete.success'));
  }
}
