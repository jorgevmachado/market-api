<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * @ORM\Table(name="tipo")
 * @ORM\Entity(repositoryClass="App\Repository\TipoRepository")
 */
class Tipo
{

    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(
     *     name="nu_tipo",
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
     *     name="no_tipo",
     *     type="string",
     *     length=200,
     *     options={"comment":"Nome do tipo do produto."}
     * )
     */
    private $tipo;

    /**
     * Tipo constructor.
     * @param string $tipo
     */
    public function __construct(string $tipo)
    {
        $this->tipo = $tipo;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param string $tipo
     * @return Tipo
     */
    public function setTipo(string $tipo): Tipo
    {
        $this->tipo = $tipo;
        return $this;
    }
}
