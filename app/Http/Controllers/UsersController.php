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
    return view('profile', compact('user', 'ajax'));
  }
}
