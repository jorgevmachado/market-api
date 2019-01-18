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
$authMiddleware = env('AUTH_MIDDLEWARE', false) ? ['middleware' => 'auth:keycloak'] : [];

Route::group($authMiddleware,
    function () {
        //Rotas Auditoria
        Route::resource('auditoria', 'LogAuditoriaController', ['except' => ['create', 'edit', 'show', 'destroy']]);

        //Rotas StatusColeta
        Route::resource('status-coleta', 'StatusColetaController', ['except' => ['create', 'edit', 'show', 'destroy']]);

        //Rotas Historico Operações
        Route::resource(
            'historico-operacao',
            'HistoricoOperacaoController',
            ['except' => ['create', 'edit', 'show', 'destroy']]);

        //Rotas HistóricoTramite
        Route::resource(
            'historico-tramite-coleta',
            'HistoricoTramiteColetaController',
            ['except' => ['create', 'edit', 'show', 'destroy']]
        );

        //Rotas VerificacaoInconsistencia
        Route::get('verificacao-inconsistencia/{id}/export', 'VerificacaoInconsistenciaController@exportCsv');
        Route::resource('verificacao-inconsistencia', 'VerificacaoInconsistenciaController');

        //Rotas Inconsistencia
        Route::get(
            'inconsistencia/por-verificacao/{idVerificacaoInconsistencia}',
            'InconsistenciaController@findByVerification'
        );

        //Rotas Consolidacao de Lotação
        Route::get(
            'consolidacao-lotacao/exite-consolidacao-lotacao/{idInventario}/{idLotacao}',
            'ConsolidacaoLotacaoController@hasConsolidacaoLotacao'
        );
        Route::get(
            'consolidacao-lotacao/ultima-consolidacao/{idInventario}/{idLotacao}',
            'ConsolidacaoLotacaoController@getUltimaConsolidacaoLotacao'
        );
        Route::resource('consolidacao-lotacao', 'ConsolidacaoLotacaoController');

        //Rotas MaterialColeta
        Route::get('material-coleta/{id}/todos', 'MaterialColetaController@getTodos');
        Route::get('material-coleta/{id}/encontrados', 'MaterialColetaController@getEncontrados');
        Route::get('material-coleta/{id}/nao-encontrados', 'MaterialColetaController@getNaoEncontrados');
        Route::get('material-coleta/{id}/encontrados-outro-local', 'MaterialColetaController@getEncontradosOutroLocal');
        Route::get('material-coleta/{id}/sem-etiqueta', 'MaterialColetaController@getSemEtiqueta');
        Route::get('material-coleta/imagem/{red}', 'MaterialColetaController@getImage');
        Route::put('material-coleta/{id}/imagem', 'MaterialColetaController@incluirImagem');
        Route::put('material-coleta/{id}/alterar-condicao-bem-patrimonial', 'MaterialColetaController@updateCondicao');
        Route::put('material-coleta/{id}/incluir-tombo-bem-patrimonial', 'MaterialColetaController@incluirTombo');
        Route::resource('material-coleta', 'MaterialColetaController');

        //Rotas MaterialColetaEnvio
        Route::get('material-coleta-recebidas/{id}/todos', 'MaterialColetaEnvioController@getTodosRecebidos');
        Route::get('material-coleta-recebidas/{id}/encontrados',
            'MaterialColetaEnvioController@getEncontradosRecebidos');
        Route::get('material-coleta-recebidas/{id}/nao-encontrados',
            'MaterialColetaEnvioController@getNaoEncontradosRecebidos');
        Route::get('material-coleta-recebidas/{id}/encontrados-outro-local',
            'MaterialColetaEnvioController@getEncontradosOutroLocalRecebidos');
        Route::get('material-coleta-recebidas/{id}/sem-etiqueta',
            'MaterialColetaEnvioController@getSemEtiquetaRecebidos');
        Route::put('material-coleta-envio/{idMaterialColetaEnvio}/alterar-estado-conservacao-bem-patrimonial',
            'MaterialColetaEnvioController@updateEstadoConservacao'
        );
        Route::put('material-coleta-envio/{idMaterialColetaEnvio}/remover-bem-patrimonial',
            'MaterialColetaEnvioController@removerBemPatrimonial'
        );

        //Rotas Coleta
        Route::get('coleta/listar-matricula', 'ColetaController@listarMatricula');
        Route::get('coleta/{id}/exporta-material/pdf', 'ColetaController@exportPdf');
        Route::get('coleta/{id}/exporta-material/csv', 'ColetaController@exportCsv');
        Route::get('coleta/ano-coleta-eventual-por-perfil', 'ColetaController@getAnoColetaEventualPorPerfil');
        Route::put('coleta/send-ma/multiplos', 'ColetaController@sendMAMultiplo');
        Route::put('coleta/{id}/send-ma', 'ColetaController@sendMA');
        Route::put('coleta/delete/multiplos', 'ColetaController@destroyMultiplo');
        Route::resource('coleta', 'ColetaController');

        //Rostas Coletas enviadas ao MA
        Route::put(
            'coleta-membro-auxiliar/{idHistoricoEnvioColeta}/invalidar-envio',
            'ColetaMembroAuxiliarController@invalidarEnvio'
        );
        Route::put(
            'coleta-membro-auxiliar/{idHistoricoEnvioColeta}/validar-envio',
            'ColetaMembroAuxiliarController@validarEnvio'
        );
        Route::get(
            'coleta-membro-auxiliar/{idHistoricoEnvioColeta}/validar-alteracao-bem/{idMaterialColetaEnvio}',
            'ColetaMembroAuxiliarController@validarAlteracaoBemPatrimonial'
        );
        Route::get(
            'coleta-membro-auxiliar/pode-consolidar-lotacao/{idInventario}/{idLotacao}',
            'ColetaMembroAuxiliarController@checkConsolidacao'
        );
        Route::resource('coleta-membro-auxiliar', 'ColetaMembroAuxiliarController');

        //Rotas Inventário
        Route::get('inventario/ano-inventario-por-perfil/{tipo}', 'InventarioController@getAnoInventarioPorPerfil');
        Route::get('inventario/inventario-anual', 'InventarioController@getInventarioAnual');
        Route::get('inventario/inventario-anual-periodo', 'InventarioController@getAnoInventarioAnualPeriodoPorPerfil');
        Route::get('inventario/{id}/membro-auxiliar', 'InventarioController@getMembroAuxiliar');
        Route::resource('inventario', 'InventarioController');

        //Rotas Membro Auxiliar
        Route::get('membro-auxiliar/auto-complete', 'MembroAuxiliarController@getLotacaoMembroAuxiliarAutoComplete');
        Route::get('membro-auxiliar/{id}/lista-lotacoes', 'MembroAuxiliarController@getLotacaoMembroAuxiliar');
        Route::get(
            'membro-auxiliar/lotacao-coleta-enviada-auto-complete',
            'MembroAuxiliarController@getLotacaoColetaEnviadaMembroAuxiliarAutoComplete'
        );
        Route::resource('membro-auxiliar', 'MembroAuxiliarController');

        //Rotas Membro Auxiliar Lotacao
        Route::put('membro-auxiliar-lotacao/{id}/cancelar',
            'MembroAuxiliarLotacaoController@cancelarMembroAuxiliarLotacao');
        Route::resource('membro-auxiliar-lotacao', 'MembroAuxiliarLotacaoController', ['except' => ['destroy']]);

        //Rotas Membro Comissão
        Route::put('membro-comissao/{id}/cancelar', 'MembroComissaoController@cancelarMembroComissao');
        Route::resource('membro-comissao', 'MembroComissaoController');

        //Rotas Lotação
        Route::get('lotacao-por-perfil', 'LotacaoController@lotacaoPorPerfil');
        Route::resource('lotacao', 'LotacaoController');

        //Rotas Tipo Tombo
        Route::resource('tipo-tombo', 'TipoTomboController');
    });

Auth::routes();