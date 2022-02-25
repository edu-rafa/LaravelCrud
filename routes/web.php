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

Route::get('/', 'HomeController@home');
Route::get('/me', 'DicasController@index');
Route::get('/admin/posts/show/{id}', 'HomeController@detalhe');
Route::get('/admin/posts/create', 'DicasController@create');
Route::post('/admin/posts/store','DicasController@store');
Route::get('/admin/posts/edit/{id}', 'DicasController@edit');
Route::patch('/admin/posts/update/{id}','DicasController@update');
Route::delete('/admin/posts/destroy/{id}', 'DicasController@destroy');
Route::get('/ajaxmarcas/{id}', 'ModeloController@PegaModelosPorId');
Route::get('/ajaxmodelo/{id}', 'ModeloController@PegaTipoPeloId');
Auth::routes();

