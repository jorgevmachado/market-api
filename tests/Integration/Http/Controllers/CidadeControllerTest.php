<?php

namespace Tests\Integration\Http\Controller;

use Tests\Integration\IntegrationTestCase;

/**
 *  Cidade
 */
class CidadeControllerTest extends IntegrationTestCase
{
    const MESSAGE = 'message';
    const CIDADE = 'cidade';
    const ESTADO = 'estado';

    public $entity = [
        "id",
        self::CIDADE,
        self::ESTADO => [
            "id",
            "sigla",
             self::ESTADO
        ]
    ];

    public $filter = [
        "filter" => [
            self::CIDADE => "Boa Vista",
            self::ESTADO => "Roraima",
            "sigla" => "RR"
        ]
    ];

    public $save = [
        self::CIDADE => "Asa Sul",
        self::ESTADO => 2
    ];

    public function testIndexCidadeSucesso()
    {
        $response = $this->get('api/cidades');
        $response->assertStatus(200);
        $response->assertJsonStructure($this->getPaginateStructure([$this->entity]));
    }

    public function testIndexCidadeFilterSucesso()
    {
        $payload = $this->filter;
        $response = $this->get('api/cidades?payload='. json_encode($payload));
        $response->assertStatus(200);
        $response->assertJsonStructure($this->getPaginateStructure([$this->entity]));
    }

    public function testShowCidadeSucesso()
    {
        $response = $this->get('api/cidades/1');
        $response->assertStatus(200);
        $response->assertJsonStructure($this->entity);
    }

    public function testStoreCidadeSucesso()
    {
        $response = $this->post('api/cidades', $this->save);
        $response->assertStatus(200);
        $response->assertJson([self::MESSAGE => 'Salvo com Sucesso!']);
    }

    public function testUpdateCidadeSucesso()
    {
        $response = $this->put('api/cidades/1', $this->save);
        $response->assertStatus(200);
        $response->assertJson([self::MESSAGE => 'Atualizado com Sucesso!']);
    }

    public function testDeleteCidadeSucesso()
    {
        $response = $this->delete('api/cidades/2');
        $response->assertStatus(200);
        $response->assertJson([self::MESSAGE => 'Excluido com Sucesso!']);
    }
}
