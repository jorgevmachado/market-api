<?php

namespace Tests\Integration\Http\Controller;

use Tests\Integration\IntegrationTestCase;

/**
 *  Pessoa
 */
class PessoaControllerTest extends IntegrationTestCase
{
    const CIDADE = 'cidade';
    const ESTADO = 'estado';
    const MESSAGE = 'message';
    
    public $entity = [
        "id",
        "nome",
        "endereco",
        "bairro",
        "telefone",
        "email",
        self::CIDADE => [
            "id",
            self::CIDADE,
            self::ESTADO => [
                "id",
                "sigla",
                "estado"
            ]
        ]
    ];
    
    public $save = [
        "nome" => "Marina Alves Ferreira",
        "endereco" => "SQN 108 BLOCO E AP 603",
        "bairro" => "ASA NORTE",
        "telefone" => "(61)99810835",
        "email" => "marininha_70@hotmail.com",
        self::CIDADE => 7
    ];

    public $filter = [
        "filter" => [
            "nome"=>"Amadeu Weirich",
        ]
    ];

    public function testIndexPessoaFilterSucesso()
    {
        $payload = $this->filter;
        $response = $this->get('api/pessoas?payload='. json_encode($payload));
        $response->assertStatus(200);
        $response->assertJsonStructure($this->getPaginateStructure([$this->entity]));
    }

    public function testIndexPessoaSucesso()
    {
        $response = $this->get('api/pessoas');
        $response->assertStatus(200);
        $response->assertJsonStructure($this->getPaginateStructure([$this->entity]));
    }

    public function testShowPessoaSucesso()
    {
        $response = $this->get('api/pessoas/1');
        $response->assertStatus(200);
        $response->assertJsonStructure($this->entity);
    }

    public function testStorePessoaSucesso()
    {
        $response = $this->post('api/pessoas',$this->save);
        $response->assertStatus(200);
        $response->assertJson([
            self::MESSAGE => 'Salvo com Sucesso!'
        ]);
    }

    public function testUpdatePessoaSucesso()
    {
        $response = $this->put('api/pessoas/1',$this->save);
        $response->assertStatus(200);
        $response->assertJson([
            self::MESSAGE => 'Atualizado com Sucesso!'
        ]);
    }

    public function testDeletePessoaSucesso()
    {
        $response = $this->delete('api/pessoas/2');
        $response->assertStatus(200);
        $response->assertJson([
            self::MESSAGE => 'Excluido com Sucesso!'
        ]);
    }

    public function testDeletePessoaErroPessoaNaoEncontrada()
    {
        $response = $this->delete('api/pessoas/9999');
        $response->assertStatus(500);
    }
}  
