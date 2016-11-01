<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Article;

use App\Http\Requests;

class UsersController extends Controller
{

  public function show($id) {
    if (is_numeric($id)) {
      $user = User::findOrFail($id);
    } else {
      $user = User::where('username', '=', $id)->first();
    }
    $articles = Article::where('user_id', '=', $user->id)->paginate(5);
    return view('users.show', compact('user','articles'));
  }
}
