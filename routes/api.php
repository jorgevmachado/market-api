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

/*
 * PUBLIC
 */

// Estados
Route::resource('estados', 'EstadoController', ['except' => ['create', 'edit', 'destroy']]);

// Cidades
Route::resource('cidades', 'CidadeController');

// Fabricantes
Route::resource('fabricantes', 'FabricanteController');

// Unidades
Route::resource('unidades', 'UnidadeController');
