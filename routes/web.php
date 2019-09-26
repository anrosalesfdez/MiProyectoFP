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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//muestra vista de home2, una especie de dashboard
Route::get('/seguimiento', function(){
    return view('home2');
});

//gestión de clientes DB
Route::resource('clientesData', 'ClienteController', ['except' => 'show']);
//muestra vista de gestión clientes
Route::get('/clientes', 'ClienteController@vista');