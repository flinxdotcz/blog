<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

class UsersController extends Controller
{
  public function show($id) {
    $ajax = true;
    $user = User::findOrFail($id);
    $title = $user->name;
    return view('profile', compact('title', 'user', 'ajax'));
  }
}
