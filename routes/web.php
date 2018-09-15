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
Route::post('/registerUser','Auth\RegisterController@registerUser')->name('registerUser');

/*
|--------------------------------------------------------------------------
| PERFIL
|--------------------------------------------------------------------------
*/
Route::get('/perfil','usuarios\PerfilesController@index')->name('perfil');
Route::get('/perfilEdit','usuarios\PerfilesController@edit')->name('perfilEdit');
Route::get('/cambiar','usuarios\PerfilesController@cambiarPass')->name('cambiar');
Route::post('/imagenUpdate','usuarios\PerfilesController@imagenUpdate')->name('imagenUpdate');
Route::post('/savePassword','usuarios\PerfilesController@savePassword')->name('savePassword');
Route::get('/getFacultades/{universidades_id}','usuarios\PerfilesController@getFacultades');
Route::post('/savePerfil','usuarios\PerfilesController@savePerfil');
Route::get('/miseventos','usuarios\PerfilesController@misEventos');

/*
|--------------------------------------------------------------------------
| EVENTOS
|--------------------------------------------------------------------------
*/
Route::get('/eventos','contenido\EventosController@index')->name('eventos');
Route::get('/evento/{id}','contenido\EventosController@infoEvento')->name('evento');
Route::get('/inscripcion/{id}','contenido\EventosController@inscripcion')->middleware('auth');
Route::post('/saveInscripcion','contenido\EventosController@saveInscripcion')->middleware('auth');


/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/
Route::get('/dashboard','admin\DashboardController@index')->name('dashboard');
Route::get('/admin.usuarios','admin\DashboardController@index');
Route::get('/searchUsuarios','admin\DashboardController@searchUsuarios');
Route::post('/registrarUsuario','admin\DashboardController@registrarUsuario');
Route::get('/getDetalleEvento/{id}','admin\DashboardController@getDetalleEvento');

