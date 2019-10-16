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
 * Explicación/detalle del proyecto
 */
Route::get('proyecto', function(){
    return view('proyecto');
});

/**
 * Muestra la interfaz Dashboard del usuario
 */
Route::get('/home', 'HomeController@index')->name('home');

/**
 * Salir del proyecto. Redirige a /
 */
Route::post('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
 
/**
 * Muestra vista Dashboard
 */
Route::get('/dashboard', function(){
    return view('dashboard'); //TODO: meter charts
})->name('dashboard');

//CLIENTES
Route::prefix('/clientes')->group(function () {
    Route::get('/clientes', 'ClienteController@vistarClientes')->name('clientes'); //VISTA clientes.blade con <clientes>
    Route::get('/clientesData', 'ClienteController@getClientes'); //DATOS recoge Request HTTP y hace GET a la BD para obtener todos los clientes de la BD
    Route::get('/clientes_detalle/{id}', 'ClienteController@getCliente'); //VISTA + DATOS detalle de cliente consultado en BD
    Route::get('/clientes_nuevo', 'ClienteController@vistarNuevo')->name('clientes_nuevo'); //VISTA clientes_nuevo.blade con <clientes_nuevo>
    Route::post('/clientes_nuevo', 'ClienteController@store'); //DATOS recoge Request HTTP y hace POST a la BD con nuevo cliente
    Route::get('/clientes_editar/{id}', 'ClienteController@vistarEditar')->name('clientes_editar'); //VISTA clientes_editar.blade con <clientes_editar>
    Route::put('/clientesData/{cliente}', 'ClienteController@update')->name('clientesData'); //DATOS recoge Request HTTP y hace POST a la BD con datos actualizados
    // Route::put('/clientesData/{cliente}', 'ClienteController@update')->name('clientesData'); //DATOS recoge Request HTTP y hace POST a la BD con datos actualizados
    Route::delete('/clientes_delete/{id}', 'ClienteController@destroy')->name('clientes_delete'); // DATOS 
});

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