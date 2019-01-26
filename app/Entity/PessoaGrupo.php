<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * @ORM\Table(name="pessoa_grupo")
 * @ORM\Entity(repositoryClass="App\Repository\PessoaGrupoRepository")
 */
class PessoaGrupo
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(
     *     name="nu_pessoa_grupo",
     *     length=10,
     *     type="integer",
     *     options={"comment":"Codigo chave da tabela, PK Identity identifica o registro unico"}
     * )
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="App\Bridge\Doctrine\ORM\Id\OracleIdentityGenerator")
     */
    private $id;

    /**
     * @var Pessoa
     * @ORM\ManyToOne(targetEntity="Pessoa")
     * @ORM\JoinColumn(name="nu_pessoa", referencedColumnName="nu_pessoa")
     */
    private $pessoa;

    /**
     * @var Grupo
     * @ORM\ManyToOne(targetEntity="Grupo")
     * @ORM\JoinColumn(name="nu_grupo", referencedColumnName="nu_grupo")
     */
    private $grupo;
}
