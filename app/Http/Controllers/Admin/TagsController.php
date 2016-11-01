<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Tag;

class TagsController extends Controller
{

  public function index(Request $request) {
    if (!$request['sortBy']) {
      $sortBy = 'updated_at';
      $desc = false;
    } else {
      $sortBy = $request['sortBy'];
      $desc = !$request['desc'];
    }
    $tags = Tag::orderBy($sortBy, $desc ? 'asc' : 'desc')->paginate(10);
    return view('admin.tags.index', compact('tags', 'desc'));
  }

  public function show($id) {
    $tag = Tag::findOrFail($id);
    return view('admin.tags.show', compact('tag'));
  }

  public function edit($id) {
    $tag = Tag::findOrFail($id);
    return view('admin.tags.edit', compact('tag'));
  }

  public function create() {
    return view('admin.tags.create');
  }

  public function store(Request $request, $id = null) {
    $this->validate($request, [
      'name' => 'required|min:3|max:15'
    ]);
    if (is_null($id)) {
      $tag = new Tag;
      $tag->created_at = \Carbon\Carbon::now();
      $tag->updated_at = \Carbon\Carbon::now();
      $statusMessage = trans('admin/forms.tags.create.status');
    } else {
      $tag = Tag::findOrFail($id);
      $tag->updated_at = \Carbon\Carbon::now();
      $statusMessage = trans('admin/forms.tags.edit.status');
    }
    $tag->name = $request->input('name');
    $tag->save();
    return redirect()->action('\App\Http\Controllers\Admin\TagsController@show', ['id' => $tag->id])->with('alert', 'success|'.$statusMessage);
  }

  public function destroy($id) {
    Tag::destroy($id);
    return redirect()->action('\App\Http\Controllers\Admin\TagsController@index')->with('alert', 'success|'.trans('admin/forms.tags.delete.success'));
  }

}
