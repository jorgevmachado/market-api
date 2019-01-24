<?php

namespace Tests\Integration\Http\Controller;

use Tests\Integration\IntegrationTestCase;

/**
 *  Unidade
 */
class UnidadeControllerTest extends IntegrationTestCase
{
    const MESSAGE = 'message';
    const SIGLA = 'sigla';
    const UNIDADE = 'unidade';
    public $entity = ["id",self::SIGLA,self::UNIDADE];
    public $filter = ["filter" => [self::SIGLA => "cm",self::UNIDADE=>"Centímetro"]];
    public $save = [self::SIGLA => "jl",self::UNIDADE=>"jorge machado"];

    public function testIndexUnidadeSucesso()
    {
        $response = $this->get('api/unidades');
        $response->assertStatus(200);
        $response->assertJsonStructure($this->getPaginateStructure([$this->entity]));
    }

    public function testIndexUnidadeFilterSucesso()
    {
        $payload = $this->filter;
        $response = $this->get('api/unidades?payload=' . json_encode($payload));
        $response->assertStatus(200);
        $response->assertJsonStructure($this->getPaginateStructure([$this->entity]));
    }

    public function testShowUnidadeSucesso()
    {
        $response = $this->get('api/unidades/1');
        $response->assertStatus(200);
        $response->assertJsonStructure($this->entity);
    }

    public function testStoreUnidadeSucesso()
    {
        $response = $this->post('api/unidades', $this->save);
        $response->assertStatus(200);
        $response->assertJson([
            self::MESSAGE => 'Salvo com Sucesso!'
        ]);
    }

    public function testUpdateUnidadeSucesso()
    {
        $response = $this->put('api/unidades/1', $this->save);
        $response->assertStatus(200);
        $response->assertJson([
            self::MESSAGE => 'Atualizado com Sucesso!'
        ]);
    }

    public function testDeleteUnidadeSucesso()
    {
        $response = $this->delete('api/unidades/2');
        $response->assertStatus(200);
        $response->assertJson([
            self::MESSAGE => 'Excluido com Sucesso!'
        ]);
    }

    public function testListUnidadeSucesso()
    {
        $response = $this->get('api/unidades-list');
        $response->assertStatus(200);
        $response->assertJsonStructure([$this->entity]);
    }
}  
