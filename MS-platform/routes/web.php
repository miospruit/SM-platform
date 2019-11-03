<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PagesController@home');
// Route::get('/about', 'PagesController@about');
// Route::get('/contact', 'PagesController@contact');

// Route::resource('users', 'UserController');
Route::post('/photo/{photo}', 'PhotoController@likePhoto')->name('like.store');
Route::delete('/photo/{photo}', 'PhotoController@deleteLike')->name('like.delete');
Route::get('/search', 'PhotoController@search')->name('photo.search');
Route::resource('/photos', 'PhotoController');
Route::resource(
    '/comment',
    'CommentController',
    ['only' => ['update', 'store', 'show', 'edit', 'destroy']]
);

Route::get('users/{user}',  ['as' => 'users.edit', 'uses' => 'UserController@edit']);
Route::patch('users/{user}/update',  ['as' => 'users.update', 'uses' => 'UserController@update']);
Route::get('changeAdmin', 'UserController@changeAdmin');

Route::get('admin/routes', 'HomeController@admin')->middleware('admin');

// Route::get('')
// Route::resource('/likes', 'LikeController');
// Route::PUT('/likes/{id}', 'LikeController@store');
// Route::resource(
//     '/like',
//     'LikeController',
//     ['only' => ['update', 'store', 'show', 'edit', 'delete']]
// );

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
