<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use App\Tag;

class UsersController extends Controller
{
  public function show($id) {
    $ajax = true;
    $user = User::findOrFail($id);
    $title = $user->name;
    $tags = Tag::displayed()->orderBy('order')->get();
    $currentOption = [
      'name' => 'Profile',
      'routeName' => 'profile-edit',
      'id' => $user->id
    ];
    return view('profile', compact('currentOption','title', 'user', 'tags', 'ajax'));
  }
}
