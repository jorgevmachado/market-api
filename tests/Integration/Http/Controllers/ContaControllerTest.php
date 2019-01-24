<?php

namespace Tests\Integration\Http\Controller;

use Tests\Integration\IntegrationTestCase;

/**
 *  Conta
 */
class ContaControllerTest extends IntegrationTestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    public function testIndexContaSucesso()
    {
        $response = $this->get('api/contas');
        $response->assertStatus(200);
        $response->assertJsonStructure($this->getPaginateStructure([[
            "id",
            "data_emissao",
            "data_vencimento",
            "valor_conta",
            "pago",
            "cliente"=> [
                "id",
                "pessoa",
                "endereco",
                "bairro",
                "telefone",
                "email",
                "cidade"=> [
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

    public function testShowContaSucesso()
    {
        $response = $this->get('api/contas/1');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            "id",
            "data_emissao",
            "data_vencimento",
            "valor_conta",
            "pago",
            "cliente"=> [
                "id",
                "pessoa",
                "endereco",
                "bairro",
                "telefone",
                "email",
                "cidade"=> [
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
