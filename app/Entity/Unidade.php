<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * @ORM\Table(name="unidade")
 * @ORM\Entity(repositoryClass="App\Repository\UnidadeRepository")
 */
class Unidade
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(
     *     name="nu_unidade",
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
     *     name="sg_unidade",
     *     type="string",
     *     length=5,
     *     options={"comment":"Sigla de medida de unidade."}
     * )
     */
    private $sigla;

    /**
     * @var string
     * @ORM\Column(
     *     name="no_unidade",
     *     type="string",
     *     length=200,
     *     options={"comment":"Nome de medida de unidade."}
     * )
     */
    private $unidade;

    /**
     * Unidade constructor.
     * @param string $sigla
     * @param string $unidade
     */
    public function __construct(string $sigla, string $unidade)
    {
        $this->sigla = $sigla;
        $this->unidade = $unidade;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param string $sigla
     * @return Unidade
     */
    public function setSigla(string $sigla): Unidade
    {
        $this->sigla = $sigla;
        return $this;
    }

    /**
     * @param string $unidade
     * @return Unidade
     */
    public function setUnidade(string $unidade): Unidade
    {
        $this->unidade = $unidade;
        return $this;
    }
}
