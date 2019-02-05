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

//Vistas Modulo Servicios
Route::get('/home/servicios', 'Servicios\ServiciosController@show')->name('servicios');
Route::get('/home/servicios/listar', 'Servicios\ServiciosListarController@show')->name('serviciosListar');
Route::get('/home/servicios/crearEditar/{id}', 'Servicios\ServiciosCrearEditarController@show')->name('serviciosCrearEditar');
Route::post('/home/servicios/crearEditar', 'Servicios\ServiciosCrearEditarController@crearEditar')->name('serviciosCrearEditar.crearEditar');
Route::get('/home/servicios/eliminar/{id}', 'Servicios\ServiciosCrearEditarController@eliminar')->name('serviciosCrearEditar.eliminar');

//vistas modulo temas

Route::get('listarTemas', ['as' => 'listarTemas', 'uses' => 'temasController@showTemas' ]);
Route::get('temas/{id}/edit', ['as' => 'showEditTemas', 'uses' => 'temasController@showEditTemas' ]);
Route::get('showCreateTemas', ['as' => 'showCreateTemas', 'uses' => 'temasController@showCreateTemas' ]);
Route::put('editarTema/{id}', ['as' => 'editarTema', 'uses' => 'temasController@editTema' ]);
Route::get('deleteTema/{id}', ['as' => 'deleteTema', 'uses' => 'temasController@deleteTema' ]);
Route::post('crearTema', 'temasController@createTema');

//vistas modulo ofertas

Route::get('listarOfertas', ['as' => 'listarOfertas', 'uses' => 'ofertasController@showOfertas' ]);
Route::get('showCreateOfertas', ['as' => 'showCreateOfertas', 'uses' => 'ofertasController@showCreateOfertas' ]);
Route::post('crearOferta', 'ofertasController@createOferta');

Route::get('deleteOferta/{id}', ['as' => 'deleteOferta', 'uses' => 'ofertasController@deleteOferta' ]);



Route::get('calendario', ['as' => 'calendario', 'uses' => 'Calendario\CalendarioController@showCalendario' ]);