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

  public function update(Request $request, $id) {
    $this->validate($request, [
      'name' => 'required|min:3|max:15',
      'colour' => 'required|min:6|max:6'
    ]);
    $tag = Tag::findOrFail($id);
    $tag->fill($request->all());
    $tag->save();
    return redirect()->action('\App\Http\Controllers\Admin\TagsController@show', ['id' => $tag->id])->with('alert', 'success|'.trans('admin/forms.tags.update.success'));
  }

  public function store(Request $request) {
    $this->validate($request, [
      'name' => 'required|min:3|max:15',
      'colour' => 'required|min:6|max:6'
    ]);
    $tag = new Tag;
    $tag->created_at = \Carbon\Carbon::now();
    $tag->updated_at = \Carbon\Carbon::now();
    $tag->name = $request->input('name');
    $tag->colour = $request->input('colour');
    $tag->save();
    return redirect()->action('\App\Http\Controllers\Admin\TagsController@show', ['id' => $tag->id])->with('alert', 'success|'.trans('admin/forms.tags.create.status'));
  }

  public function destroy($id) {
    Tag::destroy($id);
    return redirect()->action('\App\Http\Controllers\Admin\TagsController@index')->with('alert', 'success|'.trans('admin/forms.tags.delete.success'));
  }

}
