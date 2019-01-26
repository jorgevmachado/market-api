<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * @ORM\Table(name="fabricante")
 * @ORM\Entity(repositoryClass="App\Repository\FabricanteRepository")
 */
class Fabricante
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(
     *     name="nu_fabricante",
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
     *     name="no_fabricante",
     *     type="string",
     *     length=200,
     *     options={"comment":"Nome do Fabricante."}
     * )
     */
    private $fabricante;

    /**
     * @var string
     * @ORM\Column(
     *     name="lk_fabricante",
     *     type="string",
     *     length=200,
     *     options={"comment":"Site do Fabricante."}
     * )
     */
    private $site;

    /**
     * Fabricante constructor.
     * @param string $fabricante
     * @param string $site
     */
    public function __construct(string $fabricante, string $site)
    {
        $this->fabricante = $fabricante;
        $this->site = $site;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param string $fabricante
     * @return Fabricante
     */
    public function setFabricante(string $fabricante): Fabricante
    {
        $this->fabricante = $fabricante;
        return $this;
    }

    /**
     * @param string $site
     * @return Fabricante
     */
    public function setSite(string $site): Fabricante
    {
        $this->site = $site;
        return $this;
    }
}
