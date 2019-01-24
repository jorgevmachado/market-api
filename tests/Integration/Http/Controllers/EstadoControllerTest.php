<?php

namespace Tests\Integration\Http\Controllers;

use Tests\Integration\IntegrationTestCase;

/**
 *  Estado
 */
class EstadoControllerTest extends IntegrationTestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    public function testIndexEstadoSucesso()
    {
        $response = $this->get('api/estados');
        $response->assertStatus(200);
        $response->assertJsonStructure($this->getPaginateStructure(
            [
                [
                    "id",
                    "sigla",
                    "estado"
                ]
            ]
        ));
    }

    public function testIndexEstadoFilterSucesso()
    {
        $payload = [
            "filter" => [
                "sigla" => "DF",
                "estado" => "Distrito Federal"
            ]
        ];
        $response = $this->get('api/estados?payload=' . json_encode($payload));
        $response->assertStatus(200);
        $response->assertJsonStructure($this->getPaginateStructure(
            [
                [
                    "id",
                    "sigla",
                    "estado"
                ]
            ]
        ));
    }

    public function testShowEstadoSucesso()
    {
        $response = $this->get('api/estados/1');
        $response->assertStatus(200);
        $response->assertJsonStructure(
            [
                "id",
                "sigla",
                "estado"
            ]
        );
    }

    public function testListEstadoSucesso()
    {
        $response = $this->get('api/estados-list');
        $response->assertStatus(200);
        $response->assertJsonStructure(
            [
                [
                    "id",
                    "sigla",
                    "estado"
                ]
            ]
        );
    }
}
