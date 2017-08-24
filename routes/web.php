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

Route::get('/', 'ThreadsController@index');
Auth::routes();
Route::resource('threads', 'ThreadsController');
Route::resource('comments', 'CommentsController', ['except' => ['index','create','show']]);
Route::get('threads/{thread}/comment', ['as' => 'comments.create', 'uses' => 'CommentsController@create']);
