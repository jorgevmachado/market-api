<?php

namespace Tests\Integration\Http\Controller;

use Tests\Integration\IntegrationTestCase;

/**
 *  Fabricante
 */
class FabricanteControllerTest extends IntegrationTestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    public function testIndexFabricanteSucesso()
    {
        $response = $this->get('api/fabricantes');
        $response->assertStatus(200);
        $response->assertJsonStructure($this->getPaginateStructure([[
            "id",
            "fabricante",
            "site"
        ]]));
    }

    public function testIndexFabricanteFilterSucesso()
    {
        $payload = ["filter" => ["fabricante" => "Seagate"]];
        $response = $this->get('api/fabricantes?payload=' . json_encode($payload));
        $response->assertStatus(200);
        $response->assertJsonStructure($this->getPaginateStructure([[
            "id",
            "fabricante",
            "site"
        ]]));
    }

    public function testShowFabricanteSucesso()
    {
        $response = $this->get('api/fabricantes/1');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            "id",
            "fabricante",
            "site"
        ]);
    }

    public function testStoreFabricanteSucesso()
    {
        $response = $this->post('api/fabricantes', ["fabricante" => "Amazon","site"=>"www.amazon.com"]);
        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Salvo com Sucesso!'
        ]);
    }

    public function testUpdateFabricanteSucesso()
    {
        $response = $this->put('api/fabricantes/1', ["fabricante" => "Amazon","site"=>"www.amazon.com"]);
        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Atualizado com Sucesso!'
        ]);
    }

    public function testDeleteFabricanteSucesso()
    {
        $response = $this->delete('api/fabricantes/2');
        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Excluido com Sucesso!'
        ]);
    }

    public function testListFabricanteSucesso()
    {
        $response = $this->get('api/fabricantes-list');
        $response->assertStatus(200);
        $response->assertJsonStructure([[
            "id",
            "fabricante",
            "site"
        ]]);
    }
}  
