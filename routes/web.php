<?php

/**
 * Ruta principal. Inicio de programa
 */
Route::get('/', function () {
    return view('welcome');
})->name('welcome');


/**
 * Rutas control autorización de usuarios.
 */
Auth::routes();


/**
 * Salir del proyecto. Redirige a /
 */
 Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');


/**
 * Ruta a la documentación del proyecto
 */
Route::get('/proyecto', function(){
    return view('proyecto');
});


/**
 * Muestra la interfaz Home del usuario
 */
Route::get('/home', 'HomeController@index')->name('home');

 
/**
 * Muestra vista Dashboard
 */
Route::get('/dashboard', function(){
    return view('dashboard'); //TODO: meter charts
})->name('dashboard');


/**
 * Rutas para CLIENTES. Tienen prefijo.
 */
Route::prefix('/clientes')->group(function () {

    Route::get('/listar', 'ClienteController@listarClientes')->name('listar');
    Route::get('/listarCl', 'ClienteController@getClientes')->name('listarCl');
    Route::get('/ver/{id}', 'ClienteController@verCliente')->name('ver');
    
    Route::get('/crear', 'ClienteController@create')->name('crear'); //VISTA en blanco
    Route::post('/store', 'ClienteController@store');
    
    Route::get('/editar/{id}', 'ClienteController@editar')->name('editar'); //VISTA clientes_editar.blade con <clientes_editar>
    Route::put('/update/{cliente}', 'ClienteController@update');
    
    Route::delete('/delete/{id}', 'ClienteController@destroy'); // DATOS 
});


/**
 * Ruta apra gestión datos EMISOR 
 */
 Route::get('/settingsfact', 'UsuarioFacturaController@index')->name('settingsfact');
 Route::post('/settingsfact/{id}', 'UsuarioFacturaController@update');


/**
 * Rutas para gestión datos FACTURAS 
 */
Route::prefix('/facturas')->group(function () {

    Route::get('/listar', 'FacturaCabeceraController@listarFacturas')->name('listar');
    Route::get('/ver/{id}', 'FacturaCabeceraController@verFactura')->name('ver');

    Route::get('/crear', 'FacturaCabeceraController@create')->name('crear');
    Route::post('/store', 'FacturaCabeceraController@store');
    Route::post('/lineas', 'FacturaLineaController@store')->name('lineas');
    
    Route::post('/delete/{id}', 'FacturaCabeceraController@delete');
    Route::post('/pagar/{id}', 'FacturaCabeceraController@pagar');
    Route::post('/presentar/{id}', 'FacturaCabeceraController@presentar');

    Route::get('imprimir/{id}', 'FacturaCabeceraController@imprimir');
    Route::get('imprimir2/{id}', 'FacturaCabeceraController@imprimir2');

    Route::get('/grafs', 'FacturaCabeceraController@graficoFras')->name('grafs');

});



/**
 * Rutas para gestión de PRODUCTOS
 */
Route::get('/productos', 'ProductoController@listarProductos')->name('productos');
Route::get('/getProductos', 'ProductoController@getProductos')->name('getProductos');
Route::post('/productos', 'ProductoController@store');
Route::post('/productoEditar/{id}', 'ProductoController@update');
Route::delete('/productos/{id}', 'ProductoController@destroy');
Route::get('/getCnae/{idPto}', 'ProductoController@getCnae')->name('getCnae');



/**
 * Ruta apra gestión datos EMISOR 
 */
 Route::get('/emisor', 'EmisorController@index')->name('emisor');
 Route::post('/emisor/{id}', 'EmisorController@update');

 
/**
 * Ruta apra gestión datos USER aplicación
 */
Route::get('/settingsuser', 'UserController@index')->name('settingsuser');
Route::post('/settingsuser/{id}', 'UserController@update');


/**
 * Ruta apra gestión datos ACTIVIDADES
 */
 Route::get('actividades', 'ActividadController@get')->name('actividades');
 Route::get('actividadesEmisor', 'ActividadController@getEmisor')->name('actividadesEmisor');


Route::get('/prueba', 'UserController@prueba'); //PRUEBA




