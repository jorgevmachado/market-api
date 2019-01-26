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
 $onlyIndex = ['except' => ['create', 'edit', 'destroy']];
// Estados
Route::get('estados-list', 'EstadoController@list');
Route::resource('estados', 'EstadoController', $onlyIndex);

// Cidades
Route::resource('cidades', 'CidadeController');

// Fabricantes
Route::get('fabricantes-list', 'FabricanteController@list');
Route::resource('fabricantes', 'FabricanteController');

// Unidades
Route::get('unidades-list', 'UnidadeController@list');
Route::resource('unidades', 'UnidadeController');

// Tipos
Route::get('tipos-list', 'TipoController@list');
Route::resource('tipos', 'TipoController');

// Produtos
Route::resource('produtos', 'ProdutoController');

// Grupos
Route::get('grupos-list', 'GrupoController@list');
Route::resource('grupos', 'GrupoController', $onlyIndex);

// Pessoas
Route::resource('pessoas', 'PessoaController');

// Vendas
Route::resource('vendas', 'VendaController');

// Contas
Route::resource('contas', 'ContaController');

// Logs
Route::resource('logs', 'LogController',$onlyIndex);
