<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="venda")
 * @ORM\Entity(repositoryClass="App\Repository\VendaRepository")
 */
class Venda
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(
     *     name="nu_venda",
     *     length=10,
     *     type="integer",
     *     options={"comment":"Codigo chave da tabela, PK Identity identifica o registro unico"}
     * )
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="App\Bridge\Doctrine\ORM\Id\OracleIdentityGenerator")
     */
    private $id;

    /**
     * @var \DateTime
     * @ORM\Column(
     *     name="dt_venda",
     *     type="datetime",
     *     options={"comment":"Data da venda."}
     * )
     */
    private $dataVenda;

    /**
     * @var float
     * @ORM\Column(
     *     name="vl_venda",
     *     type="decimal",
     *     options={"comment":"Valor da venda."}
     * )
     */
    private $valorVenda;

    /**
     * @var float
     * @ORM\Column(
     *     name="vl_desconto",
     *     type="decimal",
     *     nullable=true,
     *     options={"comment":"Valor do desconto da venda."}
     * )
     */
    private $desconto;


    /**
     * @var float
     * @ORM\Column(
     *     name="vl_acrescimo",
     *     type="decimal",
     *     nullable=true,
     *     options={"comment":"Valor de acrescimo da venda."}
     * )
     */
    private $acrescimo;

    /**
     * @var float
     * @ORM\Column(
     *     name="vl_final",
     *     type="decimal",
     *     options={"comment":"Valor final da venda."}
     * )
     */
    private $valorFinal;

    /**
     * @var string
     * @ORM\Column(
     *     name="ds_observacao",
     *     type="string",
     *     length=4000,
     *     options={"comment":"Observações sobre a venda.."}
     * )
     */
    private $observacao;

    /**
     * @var Pessoa
     * @ORM\ManyToOne(targetEntity="Pessoa")
     * @ORM\JoinColumn(name="nu_cliente", referencedColumnName="nu_pessoa")
     */
    private $cliente;
}
