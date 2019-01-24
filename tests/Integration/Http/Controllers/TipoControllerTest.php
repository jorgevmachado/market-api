<?php

namespace Tests\Integration\Http\Controller;

use Tests\Integration\IntegrationTestCase;

/**
 *  Tipo
 */
class TipoControllerTest extends IntegrationTestCase
{
    const MESSAGE = 'message';
    public $entity = ["id","tipo"];
    public $filter = ["filter" => ["tipo" => "Insumo"]];
    public $save = ["tipo" => "massa"];


    public function testIndexTipoSucesso()
    {
        $response = $this->get('api/tipos');
        $response->assertStatus(200);
        $response->assertJsonStructure($this->getPaginateStructure([$this->entity]));
    }

    public function testIndexTipoFilterSucesso()
    {
        $payload = $this->filter;
        $response = $this->get('api/tipos?payload=' . json_encode($payload));
        $response->assertStatus(200);
        $response->assertJsonStructure($this->getPaginateStructure([$this->entity]));
    }

    public function testShowTipoSucesso()
    {
        $response = $this->get('api/tipos/1');
        $response->assertStatus(200);
        $response->assertJsonStructure($this->entity);
    }

    public function testStoreTipoSucesso()
    {
        $response = $this->post('api/tipos', $this->save);
        $response->assertStatus(200);
        $response->assertJson([
            self::MESSAGE => 'Salvo com Sucesso!'
        ]);
    }

    public function testUpdateTipoSucesso()
    {
        $response = $this->put('api/tipos/1', $this->save);
        $response->assertStatus(200);
        $response->assertJson([
            self::MESSAGE => 'Atualizado com Sucesso!'
        ]);
    }

    public function testDeleteTipoSucesso()
    {
        $response = $this->delete('api/tipos/2');
        $response->assertStatus(200);
        $response->assertJson([
            self::MESSAGE => 'Excluido com Sucesso!'
        ]);
    }

    public function testListTipoSucesso()
    {
        $response = $this->get('api/tipos-list');
        $response->assertStatus(200);
        $response->assertJsonStructure([$this->entity]);
    }
}  
