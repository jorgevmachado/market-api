<?php

namespace Tests\Integration\Http\Controller;

use Tests\Integration\IntegrationTestCase;

/**
 *  Log
 */
class LogControllerTest extends IntegrationTestCase
{
    const ID = 'id';
    public $entity = [
        self::ID,
        'tipo_operacao',
        'data_operacao',
        'nome_tabela',
        'numero_registro',
        'justificativa'
    ];
    public $filter = ["filter" => [
        "nomeTabela" => "cidade",
        "numeroRegistro" => "1",
        "tipoOperacao" => "D"
    ]];

    public function testIndexLogFilterSucesso()
    {
        $payload = $this->filter;
        $response = $this->get('api/logs?payload='. json_encode($payload));
        $response->assertStatus(200);
        $response->assertJsonStructure($this->getPaginateStructure([$this->entity]));
    }

    public function testIndexLogSucesso()
    {
        $response = $this->get('api/logs');
        $response->assertStatus(200);
        $response->assertJsonStructure($this->getPaginateStructure([$this->entity]));
    }

    public function testIndexLogErrorCaminhoErrado()
    {
        $response = $this->get('api/logss');
        $response->assertStatus(404);
    }
}  
