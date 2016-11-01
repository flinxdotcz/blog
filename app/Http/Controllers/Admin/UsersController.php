<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\User;

use App\Article;

use App\Http\Requests;

class UsersController extends Controller
{

  public function index(Request $request) {
    if (!$request['sortBy']) {
      $sortBy = 'updated_at';
      $desc = false;
    } else {
      $sortBy = $request['sortBy'];
      $desc = !$request['desc'];
    }
    $users = User::orderBy($sortBy, $desc ? 'asc' : 'desc')->paginate(10);
    return view('admin.users.index', compact('users', 'desc'));
  }

  public function show($id) {
    if (is_null($id)) {
      $user = \Auth::user();
    } else {
      $user = User::findOrFail($id);
    }
    return view('admin.users.show', compact('user'));
  }

  public function edit($id) {
    $user = User::findOrFail($id);
    $imageUpload = true;
    return view('admin.users.edit', compact('user', 'imageUpload'));
  }

  public function store(Request $request, $id) {
    $this->validate($request, [
      'name' => 'required|min:5|max:30',
      'username' => 'min:5|max:15',
      'newPassword' => 'min:3|max:30',
      'repeatPassword' => 'same:newPassword'
    ]);
    $user = User::findOrFail($id);
    if (!empty($request->input('image-reference'))) {
      $user->avatar = $request->input('image-reference');
    }
    if (!empty($request->input('newPassword'))) {
      $user->password = bcrypt($request->input('newPassword'));
    }
    $user->name = $request->input('name');
    $user->username = $request->input('username');
    $user->updated_at = \Carbon\Carbon::now();
    $user->save();
    return redirect()->action('\App\Http\Controllers\Admin\UsersController@show', ['id' => $user->id])->with('alert', 'success|'.trans('admin/forms.users.edit.status'));
  }

  public function destroy($id) {
    User::destroy($id);
    return redirect()->action('\App\Http\Controllers\Admin\UsersController@index')->with('alert', 'success|'.trans('admin/forms.users.delete.success'));
  }
}
