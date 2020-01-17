<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
 Route::resource('partidos','PartidosApiController');
 Route::get('jugadores','JugadorController@indexApi');
 Route::resource('clubes','ClubesApiController');
 Route::resource('paises','PaisesApiController');
 Route::resource('directores','DirTecApiController');
 Route::resource('ciudades','CiudadApiController');
 Route::resource('asociaciones','AsociacionApiController');
 Route::resource('estadios','EstadioApiController');
 Route::resource('torneos','TorneoApiController');
