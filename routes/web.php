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
Route::get('/' . trans('public/routes.article') . '/{id}', 'ArticlesController@show')->name('article');
// Ajax
Route::post('/feed', 'ArticlesController@getFeed');
Route::post('/like', 'ArticlesController@setLike');
// Admin routes
Route::group([
  'prefix' => 'admin',
  'namespace' => 'Admin'
  ], function() {
  Route::get('/', function() { return redirect()->action('\App\Http\Controllers\Admin\ArticlesController@index'); })->name('admin');
  // Role restricted
    //  Tag actions
    Route::group(['middleware' => 'role-access:tag-create'], function() {
      Route::get('tag/create', 'TagsController@create');
      Route::post('tag', 'TagsController@store');
    });
    Route::group(['middleware' => 'role-access:tag-edit'], function() {
      Route::get('tag/{id}/edit', 'TagsController@edit');
      Route::put('tag/{id}', 'TagsController@update');
    });
    Route::group(['middleware' => 'role-access:tag-delete'], function() {
      Route::delete('tag/{id}', 'TagsController@destroy');
    });
    //  Article actions
    Route::group(['middleware' => 'role-access:article-create'], function() {
      Route::get('article/create', 'ArticlesController@create');
      Route::post('article', 'ArticlesController@store');
    });
    Route::group(['middleware' => 'role-access:article-edit'], function() {
      Route::get('article/{id}/edit', 'ArticlesController@edit')->name('article-edit');
      Route::patch('article/{id}', 'ArticlesController@update');
      Route::put('article/{id}', 'ArticlesController@update');
    });
    Route::group(['middleware' => 'role-access:article-delete'], function() {
      Route::delete('article/{id}', 'ArticlesController@destroy');
    });
    //  User actions
    Route::group(['middleware' => 'role-access:user-edit'], function() {
      Route::get('profile/{id}/edit', 'UsersController@edit')->name('profile-edit');
      Route::put('profile/{id}', 'UsersController@update');
      Route::post('profile', 'UsersController@store');
    });
    Route::group(['middleware' => 'role-access:user-delete'], function() {
      Route::delete('profile/{id}', 'UsersController@destroy');
    });
    //  Image actions
    Route::group(['middleware' => 'role-access:image-create'], function() {
      Route::get('image/new', 'ImagesController@create');
      Route::post('image/upload', 'ImagesController@store');
    });
    Route::group(['middleware' => 'role-access:image-delete'], function() {
      Route::delete('image/{id}', 'ImagesController@destroy');
    });
  // Tags
  Route::get('tags', 'TagsController@index');
  Route::get('tag/{id}', 'TagsController@show');
  // Articles
  Route::get('articles', 'ArticlesController@index');
  Route::get('article/{id}', 'ArticlesController@show');
  // Users
  Route::get('users', 'UsersController@index');
  Route::get('profile/{id}', 'UsersController@show');
  // Images
  Route::get('images', 'ImagesController@index');
});
