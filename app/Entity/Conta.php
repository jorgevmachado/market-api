<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Table(name="conta")
 * @ORM\Entity(repositoryClass="App\Repository\ContaRepository")
 */
class Conta
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(
     *     name="nu_conta",
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
     *     name="dt_emissao",
     *     type="datetime",
     *     options={"comment":"Data da emissão da conta."}
     * )
     */
    private $dataEmissao;

    /**
     * @var \DateTime
     * @ORM\Column(
     *     name="dt_vencimento",
     *     type="datetime",
     *     options={"comment":"Data de vencimento da conta."}
     * )
     */
    private $dataVencimento;

    /**
     * @var float
     * @ORM\Column(
     *     name="vl_conta",
     *     type="decimal",
     *     options={"comment":"Valor da conta."}
     * )
     */
    private $valorConta;

    /**
     * @var string
     * @ORM\Column(
     *     name="fg_pago",
     *     type="string",
     *     length=1,
     *     options={"comment":"Flag informando se a conta foi paga
     *                (N => Não paga, S => Pago)."
     *    }
     * )
     */
    private $pago;

    /**
     * @var Pessoa
     * @ORM\ManyToOne(targetEntity="Pessoa")
     * @ORM\JoinColumn(name="nu_cliente", referencedColumnName="nu_pessoa")
     */
    private $cliente;
}
