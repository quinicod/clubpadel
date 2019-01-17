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

Route::get('/', ['as' => 'index', 'uses' => 'pagescontroler@index']);

Auth::routes();


Route::get('/instalaciones', ['as'=>'instalaciones', 'uses' =>'pagescontroler@instalaciones']);

Route::get('/tienda', ['as'=>'tienda', 'uses' =>"tiendaController@index"]);

Route::get('/tienda/buscar', ['as'=>'buscar', 'uses' =>"tiendaController@buscar"]);

Route::get('/tienda/filtroMarcas/{id}', ['as'=>'filtroMarcas', 'uses' =>"tiendaController@filtroMarcas"]);
Route::get('/tienda/filtroTipos/{id}', ['as'=>'filtroTipos', 'uses' =>"tiendaController@filtroTipos"]);

Route::get('/alquilar',['as'=>'alquilar','uses'=> "AlquilaController@usuAlquilar"]);

Route::get('admin',"pagescontroler@admin");


//Modificar perfil
Route::post('modificar','panelUsuController@update');


//Route::group(['middleware' => 'role'], function(){
//ADMIN

//Añadir user
Route::get('admin/añadirUser', 'UserController@show');

Route::post('admin/añadirUser', 'UserController@store');

// Modificar User
Route::get('admin/modificarUser', 'admincontroller@showModificar');

Route::post('admin/modificar/{id}', 'UserController@edit');

Route::post('admin/modificadoUser', 'UserController@update');

//Eliminar User
Route::get('admin/eliminarUser','admincontroller@showEliminar');

Route::post('admin/eliminarUser/{id}','UserController@destroy');


//Productos

Route::post('admin/adminProductos','ProductosController@store');

Route::post('admin/adminProductos/{id}','ProductosController@destroy');

Route::get('admin/adminProductos','ProductosController@show');

Route::post('admin/modificarProducto/{id}','ProductosController@edit');

Route::post('admin/modificado', 'ProductosController@update');



//Marcas
Route::get('admin/adminMarcas','MarcasController@show');

Route::post('admin/adminMarcas', 'MarcasController@store');

Route::post('admin/adminMarcas/{nombre}', 'MarcasController@destroy');


//Tipos
Route::get('admin/adminTipos', 'TipoproductoController@show');

Route::post('admin/adminTipos', 'TipoproductoController@store');

Route::post('admin/adminTipos/{nombre}', 'TipoproductoController@destroy');

//Alquileres
//cancelar alquiler
Route::get('admin/adminAlquileres', 'AlquilaController@show');

Route::post('admin/adminAlquileres/{idUser}/{idPista}/{fecha}/{hora}', 'AlquilaController@destroy');

//});




//Alquilar
Route::post('alquilarnuevo', 'AlquilaController@alquilarFecha');
Route::post('alquilarpista', 'AlquilaController@alquilarpista');
//PanelUsuario

Route::get('panelUsuario', ['as' => 'panelUsuario' , 'uses' => 'panelUsuController@panelUsuario']);
Route::get('panelUsuario/saldo', ['as' => 'saldo' , 'uses' => 'panelUsuController@saldo']);
Route::post('panelUsuario/saldo', ['as' => 'cambiarSaldo' , 'uses' => 'panelUsuController@cambiarSaldo']);
Route::get('panelUsuario/misReservas', ['as' => 'misReservas' , 'uses' => 'panelUsuController@misReservas']);
Route::get('panelUsuario/misCompras', ['as' => 'misCompras' , 'uses' => 'panelUsuController@misCompras']);

Route::post('misReservas/{idUser}/{idPista}/{fecha}/{hora}', 'panelUsuController@eliminarReserva');
Route::post('misCompras/{id}/{fecha}/{id_user}/{precio_total}', 'panelUsuController@eliminarCompra');

//CARRITO

Route::get('carrito',['as'=>'showCarrito', 'uses' =>"CarritoController@show"]);

Route::post('addProducto/{id}',['as'=>'carrito', 'uses' =>"CarritoController@store"]);

Route::post('eliminarCarro/{id}', 'CarritoController@eliminarRegistro');

Route::post('addCantidad/{id}', 'CarritoController@addCantidad');

Route::post('quitCantidad/{id}','CarritoController@quitCantidad');

Route::post('comprar/{total}', 'CarritoController@comprar');

//modal

route::get('modal', 'pagescontroler@modal');