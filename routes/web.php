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

    Route::get('/listar', 'ClienteController@vistarClientes')->name('listar'); //VISTA clientes.blade con <clientes>
    Route::get('/getClientesNonTrashed', 'ClienteController@getClientesNonTrashed'); //DATOS recoge Request HTTP y hace GET a la BD para obtener todos los clientes de la BD
    Route::get('/getTrashed', 'ClienteController@getClientesTrashed'); //DATOS recoge Request HTTP y hace GET a la BD para obtener todos los clientes de la BD
    Route::get('/getAll', 'ClienteController@getClientesAll'); //DATOS recoge Request HTTP y hace GET a la BD para obtener todos los clientes de la BD
    Route::get('/ver/{id}', 'ClienteController@getCliente')->name('ver'); //VISTA + DATOS detalle de cliente consultado en BD
    
    Route::get('/crear', 'ClienteController@vistaCrear')->name('crear'); //VISTA clientes_nuevo.blade con <clientes_nuevo>
    Route::post('/store', 'ClienteController@store'); //DATOS recoge Request HTTP y hace POST a la BD con nuevo cliente
    
    Route::get('/editar/{id}', 'ClienteController@vistaEditar')->name('editar'); //VISTA clientes_editar.blade con <clientes_editar>
    Route::put('/update/{cliente}', 'ClienteController@update'); //DATOS recoge Request HTTP y hace POST a la BD con datos actualizados
    
    Route::delete('/delete/{id}', 'ClienteController@destroy'); // DATOS 
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