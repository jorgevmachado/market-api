<?php

namespace Tests\Integration\Http\Controller;

use Tests\Integration\IntegrationTestCase;

/**
 *  Conta
 */
class ContaControllerTest extends IntegrationTestCase
{
    const ID = 'id';
    const CIDADE = 'cidade';
    const ESTADO = 'estado';
    
    public $entity = [
        self::ID,
        "data_emissao",
        "data_vencimento",
        "valor_conta",
        "pago",
        "cliente"=> [
            self::ID,
            "nome",
            "endereco",
            "bairro",
            "telefone",
            "email",
            self::CIDADE => [
                self::ID,
                self::CIDADE,
                self::ESTADO=> [
                    "id",
                    "sigla",
                    self::ESTADO
                ]
            ]
        ]
    ];

    public $filter = [
        "filter" => [
            "pago"=>"N",
        ]
    ];

    public function testIndexContaFilterSucesso()
    {
        $payload = $this->filter;
        $response = $this->get('api/contas?payload='. json_encode($payload));
        $response->assertStatus(200);
        $response->assertJsonStructure($this->getPaginateStructure([$this->entity]));
    }
    
    public function testIndexContaSucesso()
    {
        $response = $this->get('api/contas');
        $response->assertStatus(200);
        $response->assertJsonStructure($this->getPaginateStructure([$this->entity]));
    }

    public function testShowContaSucesso()
    {
        $response = $this->get('api/contas/1');
        $response->assertStatus(200);
        $response->assertJsonStructure($this->entity);
    }
}  
