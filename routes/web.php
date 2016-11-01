<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('/', function() {
  return redirect('/admin/users');
});
// Admin routes
Route::group([
  'middleware' => 'auth',
  'prefix' => 'admin',
  'namespace' => 'Admin'
  ], function() {
  // // Dashboard
  // Route::get('dashboard', function() {
  //   $users = \App\User::all();
  //   $articles = \App\Article::all();
  //   $tags = \App\Tag::all();
  //   return view('admin.dashboard', compact('users','tags','articles'));
  // });
  Route::get('/', function() {
    return redirect('admin/users');
  });
  // Images
  Route::get('images', 'ImagesController@index');
  Route::get('image/new', 'ImagesController@create');
  Route::post('image/upload', 'ImagesController@store')->name('imageStore');
  Route::delete('image/{id}', 'ImagesController@destroy')->middleware('restricted:admin');
  // Users
  Route::get('users', 'UsersController@index');
  Route::get('profile/{id}', 'UsersController@show');
  Route::get('profile/{id}/edit', 'UsersController@edit')->middleware('restricted:admin');
  Route::put('profile/{id}/edit', 'UsersController@store')->middleware('restricted:admin');
  Route::delete('profile/{id}', 'UsersController@destroy')->name('userDestroy')->middleware('restricted:admin,users');
  // Tags
  Route::get('tags', 'TagsController@index');
  Route::get('tag/create', 'TagsController@create');
  Route::post('tag/create', 'TagsController@store')->name('tagCreate');
  Route::get('tag/{id}', 'TagsController@show');
  Route::get('tag/{id}/edit', 'TagsController@edit');
  Route::put('tag/{id}/edit', 'TagsController@store');
  Route::delete('tag/{id}', 'TagsController@destroy')->name('tagDestroy')->middleware('restricted:admin');
  // Articles
  Route::get('articles', 'ArticlesController@index');
  Route::get('article/create', 'ArticlesController@create');
  Route::post('article/create', 'ArticlesController@store')->name('articleStore');
  Route::get('article/{id}', 'ArticlesController@show');
  Route::get('article/{id}/edit', 'ArticlesController@edit');
  Route::put('article/{id}/edit', 'ArticlesController@store');
  Route::patch('article/{id}', 'ArticlesController@update');
  Route::delete('article/{id}', 'ArticlesController@destroy')->name('articleDestroy')->middleware('restricted:admin,articles');
});
// Auth routes
Auth::routes();
