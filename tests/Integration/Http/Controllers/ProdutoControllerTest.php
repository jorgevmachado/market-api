<?php

namespace Tests\Integration\Http\Controller;

use Tests\Integration\IntegrationTestCase;

/**
 *  Produto
 */
class ProdutoControllerTest extends IntegrationTestCase
{
    const MESSAGE = 'message';
    const FABRICANTE = 'fabricante';
    const UNIDADE = 'unidade';

    public $entity =  [
       "id",
       "descricao",
       "estoque",
       "custo",
       "venda",
       self::FABRICANTE=> [
           "id",
           self::FABRICANTE,
           "site"
       ],
       self::UNIDADE=> [
           "id",
           "sigla",
           self::UNIDADE
       ],
       "tipo"=> [
           "id",
           "tipo"
       ]
   ];

   public $save = [
       "descricao"=>"Relogio Magico",
       "estoque"=>2,
       "custo"=>19.2,
       "venda"=>18.3,
       self::FABRICANTE=>1,
       self::UNIDADE=>1,
       "tipo"=>1
   ];


    public function testIndexProdutoSucesso()
    {
        $response = $this->get('api/produtos');
        $response->assertStatus(200);
        $response->assertJsonStructure($this->getPaginateStructure([$this->entity]));
    }

    public function testShowProdutoSucesso()
    {
        $response = $this->get('api/produtos/1');
        $response->assertStatus(200);
        $response->assertJsonStructure($this->entity);
    }

    public function testStoreProdutoSucesso()
    {
        $response = $this->post('api/produtos',$this->save);
        $response->assertStatus(200);
        $response->assertJson([
            self::MESSAGE => 'Salvo com Sucesso!'
        ]);
    }

    public function testUpdateProdutoSucesso()
    {
        $response = $this->put('api/produtos/1',$this->save);
        $response->assertStatus(200);
        $response->assertJson([
            self::MESSAGE => 'Atualizado com Sucesso!'
        ]);
    }

    public function testDeleteProdutoSucesso()
    {
        $response = $this->delete('api/produtos/2');
        $response->assertStatus(200);
        $response->assertJson([
            self::MESSAGE => 'Excluido com Sucesso!'
        ]);
    }
}  
