<?php

namespace Tests\Integration\Http\Controller;

use Tests\Integration\IntegrationTestCase;

/**
 *  Grupo
 */
class GrupoControllerTest extends IntegrationTestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    public function testIndexGrupoSucesso()
    {
        $response = $this->get('api/grupos');
        $response->assertStatus(200);
        $response->assertJsonStructure($this->getPaginateStructure([[
            "id",
            "grupo"
        ]]));
    }

    public function testShowGrupoSucesso()
    {
        $response = $this->get('api/grupos/1');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            "id",
            "grupo"
        ]);
    }

    public function testListGrupoSucesso()
    {
        $response = $this->get('api/grupos-list');
        $response->assertStatus(200);
        $response->assertJsonStructure([[
            "id",
            "grupo"
        ]]);
    }
}  
