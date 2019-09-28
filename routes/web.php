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

/**
 * Dashboar
 */
Route::get('/dashboard', function(){
    return view('dashboard'); //TODO: meter charts
});

/**
 * Gestión de clientes vistas
 */
Route::get('/clientes', 'ClienteController@listarClientes');
Route::get('/clientes_nuevo', 'ClienteController@clientesNuevo');
Route::get('/clientes_editar', 'ClienteController@clientesEditar');

/**
 * Gestión de clientes DB
 */
// Route::resource('clientesData', 'ClienteController', ['except' => 'show']);
Route::resource('clientesData', 'ClienteController');


Route::get('/facturacion', function(){
    return view('facturacion');
});

Route::get('/productos', function(){
    return view('productos');
});

/**
 * Gestión de productos DB
 */

 /**
 * Gestión de facturas DB
 */