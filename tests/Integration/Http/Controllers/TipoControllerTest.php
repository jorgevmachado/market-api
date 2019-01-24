<?php

namespace Tests\Integration\Http\Controller;

use Tests\Integration\IntegrationTestCase;

/**
 *  Tipo
 */
class TipoControllerTest extends IntegrationTestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    public function testIndexTipoSucesso()
    {
        $response = $this->get('api/tipos');
        $response->assertStatus(200);
        $response->assertJsonStructure($this->getPaginateStructure([["id","tipo"]]));
    }

    public function testIndexTipoFilterSucesso()
    {
        $payload = ["filter" => ["tipo" => "Insumo"]];
        $response = $this->get('api/tipos?payload=' . json_encode($payload));
        $response->assertStatus(200);
        $response->assertJsonStructure($this->getPaginateStructure([["id","tipo"]]));
    }

    public function testShowTipoSucesso()
    {
        $response = $this->get('api/tipos/1');
        $response->assertStatus(200);
        $response->assertJsonStructure(["id","tipo"]);
    }

    public function testStoreTipoSucesso()
    {
        $response = $this->post('api/tipos', ["tipo" => "massa"]);
        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Salvo com Sucesso!'
        ]);
    }

    public function testUpdateTipoSucesso()
    {
        $response = $this->put('api/tipos/1', ["tipo" => "carne"]);
        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Atualizado com Sucesso!'
        ]);
    }

    public function testDeleteTipoSucesso()
    {
        $response = $this->delete('api/tipos/2');
        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Excluido com Sucesso!'
        ]);
    }

    public function testListTipoSucesso()
    {
        $response = $this->get('api/tipos-list');
        $response->assertStatus(200);
        $response->assertJsonStructure([["id","tipo"]]);
    }
}  
