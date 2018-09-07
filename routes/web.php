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
Route::get('/','HomeController@index')->name('welcome');
Route::post('/log.store', 'LogController@store');       
Route::post('/validar', 'HomeController@validar');

Auth::routes();

/*
|--------------------------------------------------------------------------
| ERROR 404
|--------------------------------------------------------------------------
*/
Route::fallback('HomeController@notFound');

/*
|--------------------------------------------------------------------------
| REGISTRO
|--------------------------------------------------------------------------
*/
Route::post('/registerUser','auth\RegisterController@registerUser')->name('registerUser');

/*
|--------------------------------------------------------------------------
| PERFIL
|--------------------------------------------------------------------------
*/
Route::get('/perfil','usuarios\PerfilesController@index')->name('perfil');
Route::get('/perfilEdit','usuarios\PerfilesController@edit')->name('perfilEdit');
Route::get('/getFacultades/{universidades_id}','usuarios\PerfilesController@getFacultades');
Route::post('/savePerfil','usuarios\PerfilesController@savePerfil');
Route::get('/miseventos','usuarios\PerfilesController@misEventos');

/*
|--------------------------------------------------------------------------
| EVENTOS
|--------------------------------------------------------------------------
*/
Route::get('/eventos','contenido\EventosController@index')->name('eventos');
Route::get('/evento/{id}','contenido\EventosController@infoEvento');
Route::get('/inscripcion/{id}/{accion}/{certificado}','contenido\EventosController@inscripcion')->middleware('auth');