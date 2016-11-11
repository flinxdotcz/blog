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
    $currentOption = [
      'name' => 'Article',
      'routeName' => 'article',
      'id' => $article->slug
    ];
    return view('admin.articles.show', compact('currentOption','article'));
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
    $this->validate($request, [
      'name' => 'required|min:5|max:65',
      'tags' => 'required|min:1',
      'content' => 'required|min:20|max:9000'
    ]);
    $article = Article::findOrFail($id);
    if (!empty($request->input('image-reference'))) {
      $article->thumbnail = $request->input('image-reference');
    }
    $article->fill($request->all());
    $article->slug = $article->id;
    $article->save();
    $article->tags()->sync($request->input('tags'));
    return redirect()->action('\App\Http\Controllers\Admin\ArticlesController@show', ['id' => $article->id])->with('alert', 'success|'.trans('admin/forms.articles.update.success'));
  }

  public function store(Request $request) {
    $this->validate($request, [
      'name' => 'required|min:5|max:65',
      'tags' => 'required|min:1',
      'content' => 'required|min:20|max:9000'
    ]);
    $article = new Article;
    if (!empty($request->input('image-reference'))) {
      $article->thumbnail = $request->input('image-reference');
    }
    $article->created_at = \Carbon\Carbon::now();
    $article->updated_at = \Carbon\Carbon::now();
    $article->user_id = \Auth::user()->id;
    $article->name = $request->input('name');
    $article->published_at = $request->input('published_at');
    $article->content = $request->input('content');
    $article->excerpt = $request->input('content');
    $article->save();
    $article->slug = $article->id;
    $article->save();
    $article->tags()->sync($request->input('tags'));
    return redirect()->action('\App\Http\Controllers\Admin\ArticlesController@show', ['id' => $article->id])->with('alert', 'success|' . trans('admin/forms.articles.create.status'));
  }

  public function destroy($id) {
    Article::destroy($id);
    return redirect()->action('\App\Http\Controllers\Admin\ArticlesController@index')->with('alert', 'success|'.trans('admin/forms.articles.delete.success'));
  }
}
