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

Route::get('/', 'PostsController@index');
Auth::routes();
Route::get('/password/email', function() {return redirect('/');});
Route::get('/password/reset', function() {return redirect('/');});
// Route::get('/home', 'HomeController@index')->name('home');
Route::resource('posts','PostsController', ['only' => ['index','create','store','edit','destroy']]);
