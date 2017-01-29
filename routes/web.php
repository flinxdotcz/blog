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

// Auth routes
Auth::routes();
// Public routes
Route::get('/', 'HomeController@index')->name('home');
Route::get('/profile/{id}', 'UsersController@show')->name('profile');
Route::get('/tag/{id}', 'TagsController@show')->name('tag');
Route::get('/' . trans('public/routes.article') . '/{id}', 'ArticlesController@show')->middleware('hits')->name('article');
// Ajax
Route::post('/article/{id}/hits', 'ArticlesController@addHit');
Route::post('/feed', 'ArticlesController@getFeed');
// Admin routes
Route::group([
  'middleware' => 'auth',
  'prefix' => 'admin',
  'namespace' => 'Admin'
  ], function() {
  Route::get('/', function() { return redirect()->action('\App\Http\Controllers\Admin\ArticlesController@index'); })->name('admin');
  // Images
  Route::get('images', 'ImagesController@index');
  Route::get('image/new', 'ImagesController@create');
  Route::post('image/upload', 'ImagesController@store');
  Route::delete('image/{id}', 'ImagesController@destroy')->middleware('restricted:admin');
  // Users
  Route::get('users', 'UsersController@index');
  Route::post('profile', 'UsersController@store');
  Route::get('profile/{id}', 'UsersController@show');
  Route::get('profile/{id}/edit', 'UsersController@edit')->name('profile-edit')->middleware('restricted:admin');
  Route::put('profile/{id}', 'UsersController@update')->middleware('restricted:admin');
  Route::delete('profile/{id}', 'UsersController@destroy')->middleware('restricted:admin,users');
  // Tags
  Route::get('tags', 'TagsController@index');
  Route::get('tag/create', 'TagsController@create');
  Route::post('tag', 'TagsController@store');
  Route::get('tag/{id}', 'TagsController@show');
  Route::get('tag/{id}/edit', 'TagsController@edit');
  Route::put('tag/{id}', 'TagsController@update');
  Route::delete('tag/{id}', 'TagsController@destroy')->middleware('restricted:admin,tags');
  // Articles
  Route::get('articles', 'ArticlesController@index');
  Route::get('article/create', 'ArticlesController@create');
  Route::post('article', 'ArticlesController@store');
  Route::get('article/{id}', 'ArticlesController@show');
  Route::get('article/{id}/edit', 'ArticlesController@edit')->name('article-edit');
  Route::patch('article/{id}', 'ArticlesController@update');
  Route::put('article/{id}', 'ArticlesController@update');
  Route::delete('article/{id}', 'ArticlesController@destroy')->middleware('restricted:admin,articles');
});
