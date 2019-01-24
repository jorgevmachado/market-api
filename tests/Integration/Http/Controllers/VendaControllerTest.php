<?php

namespace Tests\Integration\Http\Controller;

use Tests\Integration\IntegrationTestCase;

/**
 *  Venda
 */
class VendaControllerTest extends IntegrationTestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    public function testIndexVendaSucesso()
    {
        $response = $this->get('api/vendas');
        $response->assertStatus(200);
        $response->assertJsonStructure($this->getPaginateStructure([[
            "id",
            "data_venda",
            "valor_venda",
            "desconto",
            "acrescimo",
            "valor_final",
            "observacao",
            "cliente"=> [
                "id",
                "pessoa",
                "endereco",
                "bairro",
                "telefone",
                "email",
                "cidade" => [
                    "id",
                    "cidade",
                    "estado"=> [
                        "id",
                        "sigla",
                        "estado"
                    ]
                ]
            ]
        ]]));
    }

    public function testShowVendaSucesso()
    {
        $response = $this->get('api/vendas/1');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            "id",
            "data_venda",
            "valor_venda",
            "desconto",
            "acrescimo",
            "valor_final",
            "observacao",
            "cliente"=> [
                "id",
                "pessoa",
                "endereco",
                "bairro",
                "telefone",
                "email",
                "cidade" => [
                    "id",
                    "cidade",
                    "estado"=> [
                        "id",
                        "sigla",
                        "estado"
                    ]
                ]
            ]
        ]);
    }
}  
