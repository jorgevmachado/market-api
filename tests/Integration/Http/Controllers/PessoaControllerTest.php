<?php

namespace Tests\Integration\Http\Controller;

use Tests\Integration\IntegrationTestCase;

/**
 *  Pessoa
 */
class PessoaControllerTest extends IntegrationTestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    public function testIndexPessoaSucesso()
    {
        $response = $this->get('api/pessoas');
        $response->assertStatus(200);
        $response->assertJsonStructure($this->getPaginateStructure([[
            "id",
            "pessoa",
            "endereco",
            "bairro",
            "telefone",
            "email",
            "cidade" => [
                "id",
                "cidade",
                "estado" => [
                    "id",
                    "sigla",
                    "estado"
                ]
            ]
        ]]));
    }

    public function testShowPessoaSucesso()
    {
        $response = $this->get('api/pessoas/1');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            "id",
            "pessoa",
            "endereco",
            "bairro",
            "telefone",
            "email",
            "cidade" => [
                "id",
                "cidade",
                "estado" => [
                    "id",
                    "sigla",
                    "estado"
                ]
            ]
        ]);
    }

    public function testStorePessoaSucesso()
    {
        $response = $this->post('api/pessoas',
            [
                "pessoa" => "Marina Alves Ferreira",
                "endereco" => "SQN 108 BLOCO E AP 603",
                "bairro" => "ASA NORTE",
                "telefone" => "(61)99810835",
                "email" => "marininha_70@hotmail.com",
                "cidade" => 7
            ]);
        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Salvo com Sucesso!'
        ]);
    }

    public function testUpdatePessoaSucesso()
    {
        $response = $this->put('api/pessoas/1',
            [
                "pessoa" => "Marina Alves Ferreira",
                "endereco" => "SQN 108 BLOCO E AP 603",
                "bairro" => "ASA NORTE",
                "telefone" => "(61)99810835",
                "email" => "marininha_70@hotmail.com",
                "cidade" => 7
            ]);
        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Atualizado com Sucesso!'
        ]);
    }

    public function testDeletePessoaSucesso()
    {
        $response = $this->delete('api/pessoas/2');
        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Excluido com Sucesso!'
        ]);
    }

    public function testDeletePessoaErroPessoaNaoEncontrada()
    {
        $response = $this->delete('api/pessoas/9999');
        $response->assertStatus(500);
    }
}  
