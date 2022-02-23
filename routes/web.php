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
Route::get('/admin/posts/create', 'PostsController@create')->middleware('auth');
Route::get('/admin/posts/edit/{id}', 'PostsController@edit')->middleware('auth');
Route::patch('/admin/posts/update/{id}','PostsController@update')->middleware('auth');
Route::delete('/admin/posts/destroy/{id}', 'PostsController@destroy')->middleware('auth');
Auth::routes();

