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

Route::get('/seguimiento', function(){
    return view('seguimiento');
});

//gestión de clientes DB
Route::resource('clientesData', 'ClienteController', ['except' => 'show']);
//g
Route::get('/clientes', 'ClienteController@vista');