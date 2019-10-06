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

/**
 * Ruta principal. Inicio de programa
 */
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

/**
 * Rutas control autorización de usuarios.
 * Registers a login route with the name login
 */
Auth::routes();

/**
 * Ruta para explicación/detalle del proyecto
 */
Route::get('proyecto', function(){
    return view('proyecto');
});

/**
 * Ruta que muestra la interfaz del usuario
 */
Route::get('/home', 'HomeController@index')->name('home');

/**
 * Ruta para salir del proyecto. Redirige a /
 */
Route::post('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
 
/**
 * Dashboard
 */
Route::get('/dashboard', function(){
    return view('dashboard'); //TODO: meter charts
})->name('dashboard');

/**
 * Gestión de clientes vistas
 */
Route::get('/clientes', 'ClienteController@listarClientes')->name('clientes');
Route::get('/clientes_nuevo', 'ClienteController@clientesNuevo')->name('clientes_nuevo');
Route::get('/clientes_editar/{id}', 'ClienteController@clientesEditar')->name('clientes_editar');

/**
 * Gestión de clientes DB
 */
// Route::resource('clientesData', 'ClienteController', ['except' => 'show']);
Route::resource('clientesData', 'ClienteController');


Route::get('/facturacion', function(){
    return view('facturacion');
})->name('facturacion');

Route::get('/productos', function(){
    return view('productos');
})->name('productos');

/**
 * Gestión de productos DB
 */

 /**
 * Gestión de facturas DB
 */