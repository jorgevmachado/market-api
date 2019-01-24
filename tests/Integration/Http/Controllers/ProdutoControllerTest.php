<?php

namespace Tests\Integration\Http\Controller;

use Tests\Integration\IntegrationTestCase;

/**
 *  Produto
 */
class ProdutoControllerTest extends IntegrationTestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    public function testIndexProdutoSucesso()
    {
        $response = $this->get('api/produtos');
        $response->assertStatus(200);
        $response->assertJsonStructure($this->getPaginateStructure([[
            "id",
            "descricao",
            "estoque",
            "custo",
            "venda",
            "fabricante"=> [
                "id",
                "fabricante",
                "site"
            ],
            "unidade"=> [
                "id",
                "sigla",
                "unidade"
            ],
            "tipo"=> [
                "id",
                "tipo"
            ]
        ]]));
    }

    public function testShowProdutoSucesso()
    {
        $response = $this->get('api/produtos/1');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            "id",
            "descricao",
            "estoque",
            "custo",
            "venda",
            "fabricante"=> [
                "id",
                "fabricante",
                "site"
            ],
            "unidade"=> [
                "id",
                "sigla",
                "unidade"
            ],
            "tipo"=> [
                "id",
                "tipo"
            ]
        ]);
    }

    public function testStoreProdutoSucesso()
    {
        $response = $this->post('api/produtos',
            [
                "descricao"=>"Relogio Magico",
	            "estoque"=>2,
	            "custo"=>19.2,
	            "venda"=>18.3,
	            "fabricante"=>1,
	            "unidade"=>1,
	            "tipo"=>1
            ]);
        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Salvo com Sucesso!'
        ]);
    }

    public function testUpdateProdutoSucesso()
    {
        $response = $this->put('api/produtos/1',
            [
                "descricao"=>"Relogio Magico",
                "estoque"=>1,
                "custo"=>12.2,
                "venda"=>13.3,
                "fabricante"=>2,
                "unidade"=>2,
                "tipo"=>2
            ]);
        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Atualizado com Sucesso!'
        ]);
    }

    public function testDeleteProdutoSucesso()
    {
        $response = $this->delete('api/produtos/2');
        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Excluido com Sucesso!'
        ]);
    }
}  
