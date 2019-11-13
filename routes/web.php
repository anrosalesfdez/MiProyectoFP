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

    Route::get('/listar', 'ClienteController@getClientesNonTrashed')->name('listar'); //VISTA clientes.blade con <clientes>
    Route::get('/ver/{id}', 'ClienteController@getCliente')->name('ver'); //VISTA + DATOS detalle de cliente consultado en BD
    
    Route::get('/crear', 'ClienteController@create')->name('crear'); //VISTA clientes_nuevo.blade con <clientes_nuevo>
    Route::post('/store', 'ClienteController@store'); //DATOS recoge Request HTTP y hace POST a la BD con nuevo cliente
    
    Route::get('/editar/{id}', 'ClienteController@vistaEditar')->name('editar'); //VISTA clientes_editar.blade con <clientes_editar>
    Route::put('/update/{cliente}', 'ClienteController@update'); //DATOS recoge Request HTTP y hace POST a la BD con datos actualizados
    
    Route::delete('/delete/{id}', 'ClienteController@destroy'); // DATOS 
});

//PRODUCTOS
Route::get('/productos', 'ProductoController@index')->name('productos');
Route::post('/productos', 'ProductoController@store');
Route::post('/productoeditar/{id}', 'ProductoController@actualizar');
Route::delete('/productos/{id}', 'ProductoController@destroy');

//FACTURACIÓN
Route::get('/facturacion', function(){
    return view('facturacion');
})->name('facturacion');

//CONFIGURACIONES
Route::get('/settingsuser', 'UserController@index')->name('settingsuser');
Route::post('/settingsuser/{id}', 'UserController@update');
Route::get('/prueba', 'UserController@prueba'); //PRUEBA
Route::get('/settingsfact', 'UsuarioFacturaController@index')->name('settingsfact');
Route::post('/settingsfact/{id}', 'UsuarioFacturaController@update');

