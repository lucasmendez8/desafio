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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('barrios/get_by_ciudad', 'BarrioController@getByCiudad')->name('barrios.get_by_ciudad');

Route::get('image', 'ImageController@index');
Route::get('save', 'ImageController@save');
Route::get('perfil/editar', 'UserController@edit')->name('perfil.editar');
Route::put('perfil/{id}', 'UserController@update')->name('perfil.update');

Route::resource('clientes', 'ClienteController');
Route::resource('ciudades', 'CiudadeController');
Route::resource('barrios', 'BarrioController');
Route::resource('servicios', 'ServicioController');
