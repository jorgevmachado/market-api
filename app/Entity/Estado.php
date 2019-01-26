<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * @ORM\Table(name="estado")
 * @ORM\Entity(repositoryClass="App\Repository\EstadoRepository")
 */
class Estado
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(
     *     name="nu_estado",
     *     length=10,
     *     type="integer",
     *     options={"comment":"Codigo chave da tabela, PK Identity identifica o registro unico"}
     * )
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="App\Bridge\Doctrine\ORM\Id\OracleIdentityGenerator")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(
     *     name="sg_estado",
     *     type="string",
     *     length=2,
     *     options={"comment":"Sigla do Estado."}
     * )
     */
    private $sigla;

    /**
     * @var string
     * @ORM\Column(
     *     name="no_estado",
     *     type="string",
     *     length=200,
     *     options={"comment":"Nome do Estado."}
     * )
     */
    private $estado;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}
