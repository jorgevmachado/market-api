<?php

namespace Tests\Integration\Http\Controller;

use Tests\Integration\IntegrationTestCase;

/**
 *  Fabricante
 */
class FabricanteControllerTest extends IntegrationTestCase
{
    const ID = 'id';
    const FABRICANTE = 'fabricante';
    const MESSAGE = 'message';


    public $entity = [
        self::ID,
        self::FABRICANTE,
        "site"
    ];

    public $filter = [
        "filter" => [
            self::FABRICANTE =>  "Amazon",
            "site"=>"www.amazon.com"
        ]
    ];

    public $save = [
        self::FABRICANTE => "Amazon",
        "site"=>"www.amazon.com"
    ];

    public function testIndexFabricanteSucesso()
    {
        $response = $this->get('api/fabricantes');
        $response->assertStatus(200);
        $response->assertJsonStructure($this->getPaginateStructure([$this->entity]));
    }

    public function testIndexFabricanteFilterSucesso()
    {
        $payload = ["filter" => [self::FABRICANTE => "Seagate"]];
        $response = $this->get('api/fabricantes?payload=' . json_encode($payload));
        $response->assertStatus(200);
        $response->assertJsonStructure($this->getPaginateStructure([$this->entity]));
    }

    public function testShowFabricanteSucesso()
    {
        $response = $this->get('api/fabricantes/1');
        $response->assertStatus(200);
        $response->assertJsonStructure($this->entity);
    }

    public function testStoreFabricanteSucesso()
    {
        $response = $this->post('api/fabricantes', $this->save);
        $response->assertStatus(200);
        $response->assertJson([
            self::MESSAGE => 'Salvo com Sucesso!'
        ]);
    }

    public function testUpdateFabricanteSucesso()
    {
        $response = $this->put('api/fabricantes/1', $this->save);
        $response->assertStatus(200);
        $response->assertJson([
            self::MESSAGE => 'Atualizado com Sucesso!'
        ]);
    }

    public function testDeleteFabricanteSucesso()
    {
        $response = $this->delete('api/fabricantes/2');
        $response->assertStatus(200);
        $response->assertJson([
            self::MESSAGE => 'Excluido com Sucesso!'
        ]);
    }

    public function testListFabricanteSucesso()
    {
        $response = $this->get('api/fabricantes-list');
        $response->assertStatus(200);
        $response->assertJsonStructure([$this->entity]);
    }
}  
