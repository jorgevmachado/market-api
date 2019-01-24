<?php

namespace Tests\Integration\Http\Controller;

use Tests\Integration\IntegrationTestCase;

/**
 *  Grupo
 */
class GrupoControllerTest extends IntegrationTestCase
{
    public $entity = [
        "id",
        "grupo"
    ];

    public function testIndexGrupoSucesso()
    {
        $response = $this->get('api/grupos');
        $response->assertStatus(200);
        $response->assertJsonStructure($this->getPaginateStructure([$this->entity]));
    }

    public function testShowGrupoSucesso()
    {
        $response = $this->get('api/grupos/1');
        $response->assertStatus(200);
        $response->assertJsonStructure($this->entity);
    }

    public function testListGrupoSucesso()
    {
        $response = $this->get('api/grupos-list');
        $response->assertStatus(200);
        $response->assertJsonStructure([$this->entity]);
    }
}  
