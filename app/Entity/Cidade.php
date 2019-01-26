<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * @ORM\Table(name="cidade")
 * @ORM\Entity(repositoryClass="App\Repository\CidadeRepository")
 */
class Cidade
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(
     *     name="nu_cidade",
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
     *     name="no_cidade",
     *     type="string",
     *     length=200,
     *     options={"comment":"Nome da cidade."}
     * )
     */
    private $cidade;

    /**
     * @var Estado
     * @ORM\ManyToOne(targetEntity="Estado")
     * @ORM\JoinColumn(name="nu_estado", referencedColumnName="nu_estado")
     */
    private $estado;

    /**
     * Cidade constructor.
     * @param string $cidade
     * @param Estado $estado
     */
    public function __construct(string $cidade, Estado $estado)
    {
        $this->cidade = $cidade;
        $this->estado = $estado;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param string $cidade
     * @return Cidade
     */
    public function setCidade(string $cidade): Cidade
    {
        $this->cidade = $cidade;
        return $this;
    }

    /**
     * @param Estado $estado
     * @return Cidade
     */
    public function setEstado(Estado $estado): Cidade
    {
        $this->estado = $estado;
        return $this;
    }
}
