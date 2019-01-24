<?php

namespace Tests\Integration\Http\Controller;

use Tests\Integration\IntegrationTestCase;

/**
 *  Unidade
 */
class UnidadeControllerTest extends IntegrationTestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    public function testIndexUnidadeSucesso()
    {
        $response = $this->get('api/unidades');
        $response->assertStatus(200);
        $response->assertJsonStructure($this->getPaginateStructure([["id","sigla","unidade"]]));
    }

    public function testIndexUnidadeFilterSucesso()
    {
        $payload = ["filter" => ["sigla" => "cm","unidade"=>"Centímetro"]];
        $response = $this->get('api/unidades?payload=' . json_encode($payload));
        $response->assertStatus(200);
        $response->assertJsonStructure($this->getPaginateStructure([["id","sigla","unidade"]]));
    }

    public function testShowUnidadeSucesso()
    {
        $response = $this->get('api/unidades/1');
        $response->assertStatus(200);
        $response->assertJsonStructure(["id","sigla","unidade"]);
    }

    public function testStoreUnidadeSucesso()
    {
        $response = $this->post('api/unidades', ["sigla" => "jl","unidade"=>"jorge machado"]);
        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Salvo com Sucesso!'
        ]);
    }

    public function testUpdateUnidadeSucesso()
    {
        $response = $this->put('api/unidades/1', ["sigla" => "jl","unidade"=>"jorge machado"]);
        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Atualizado com Sucesso!'
        ]);
    }

    public function testDeleteUnidadeSucesso()
    {
        $response = $this->delete('api/unidades/2');
        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Excluido com Sucesso!'
        ]);
    }

    public function testListUnidadeSucesso()
    {
        $response = $this->get('api/unidades-list');
        $response->assertStatus(200);
        $response->assertJsonStructure([["id","sigla","unidade"]]);
    }
}  
