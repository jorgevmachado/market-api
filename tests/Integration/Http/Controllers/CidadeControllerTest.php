<?php

namespace Tests\Integration\Http\Controller;

use Tests\Integration\IntegrationTestCase;

/**
 *  Cidade
 */
class CidadeControllerTest extends IntegrationTestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    public function testIndexCidadeSucesso()
    {
        $response = $this->get('api/cidades');
        $response->assertStatus(200);
        $response->assertJsonStructure($this->getPaginateStructure(
            [
                [
                    "id",
                    "cidade",
                    "estado" => [
                        "id",
                        "sigla",
                        "estado"
                    ]
                ]
            ]
        ));
    }

    public function testIndexCidadeFilterSucesso()
    {
        $payload = [
            "filter" => [
                "cidade" => "Boa Vista",
                "estado" => "Roraima",
                "sigla" => "RR"
            ]
        ];
        $response = $this->get('api/cidades?payload='. json_encode($payload));
        $response->assertStatus(200);
        $response->assertJsonStructure($this->getPaginateStructure(
            [
                [
                    "id",
                    "cidade",
                    "estado" => [
                        "id",
                        "sigla",
                        "estado"
                    ]
                ]
            ]
        ));
    }

    public function testShowCidadeSucesso()
    {
        $response = $this->get('api/cidades/1');
        $response->assertStatus(200);
        $response->assertJsonStructure(
            [

                "id",
                "cidade",
                "estado" => [
                    "id",
                    "sigla",
                    "estado"
                ]

            ]
        );
    }

    public function testStoreCidadeSucesso()
    {
        $response = $this->post('api/cidades',
            [
                "cidade" => "Asa Norte",
                "estado" => 1

            ]
        );
        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Salvo com Sucesso!'
        ]);
    }

    public function testUpdateCidadeSucesso()
    {
        $response = $this->put('api/cidades/1',
            [
                "cidade" => "Asa Sul",
                "estado" => 2
            ]
        );
        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Atualizado com Sucesso!'
        ]);
    }

    public function testDeleteCidadeSucesso()
    {
        $response = $this->delete('api/cidades/2');
        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Excluido com Sucesso!'
        ]);
    }
}
