<?php

namespace Tests\Integration\Http\Controllers;

use Tests\Integration\IntegrationTestCase;

/**
 *  Estado
 */
class EstadoControllerTest extends IntegrationTestCase
{

    public $entity = [
        "id",
        "sigla",
        "estado"
    ];

    public function testIndexEstadoSucesso()
    {
        $response = $this->get('api/estados');
        $response->assertStatus(200);
        $response->assertJsonStructure($this->getPaginateStructure([$this->entity]));
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
        $response->assertJsonStructure($this->getPaginateStructure([$this->entity]));
    }

    public function testShowEstadoSucesso()
    {
        $response = $this->get('api/estados/1');
        $response->assertStatus(200);
        $response->assertJsonStructure($this->entity);
    }

    public function testListEstadoSucesso()
    {
        $response = $this->get('api/estados-list');
        $response->assertStatus(200);
        $response->assertJsonStructure([$this->entity]);
    }
}
