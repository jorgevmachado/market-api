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

// ESTADO
Route::resource('estados', 'EstadoController', ['except' => ['create', 'edit', 'destroy']]);

// CIDADE
Route::resource('cidades', 'CidadeController');
