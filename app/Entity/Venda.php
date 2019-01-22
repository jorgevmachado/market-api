<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * @codeCoverageIgnore
 *
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

    /**
     * Venda constructor.
     * @param \DateTime $dataVenda
     * @param float $valorVenda
     * @param float $desconto
     * @param float $acrescimo
     * @param float $valorFinal
     * @param string $observacao
     * @param Pessoa $cliente
     */
    public function __construct(
        \DateTime $dataVenda,
        float $valorVenda,
        float $desconto,
        float $acrescimo,
        float $valorFinal,
        string $observacao,
        Pessoa $cliente
    ){
        $this->dataVenda = $dataVenda;
        $this->valorVenda = $valorVenda;
        $this->desconto = $desconto;
        $this->acrescimo = $acrescimo;
        $this->valorFinal = $valorFinal;
        $this->observacao = $observacao;
        $this->cliente = $cliente;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return \DateTime
     */
    public function getDataVenda(): \DateTime
    {
        return $this->dataVenda;
    }

    /**
     * @return float
     */
    public function getValorVenda(): float
    {
        return $this->valorVenda;
    }

    /**
     * @return float
     */
    public function getDesconto(): float
    {
        return $this->desconto;
    }

    /**
     * @return float
     */
    public function getAcrescimo(): float
    {
        return $this->acrescimo;
    }

    /**
     * @return float
     */
    public function getValorFinal(): float
    {
        return $this->valorFinal;
    }

    /**
     * @return string
     */
    public function getObservacao(): string
    {
        return $this->observacao;
    }

    /**
     * @return Pessoa
     */
    public function getCliente(): Pessoa
    {
        return $this->cliente;
    }

    /**
     * @param \DateTime $dataVenda
     * @return Venda
     */
    public function setDataVenda(\DateTime $dataVenda): Venda
    {
        $this->dataVenda = $dataVenda;
        return $this;
    }

    /**
     * @param float $valorVenda
     * @return Venda
     */
    public function setValorVenda(float $valorVenda): Venda
    {
        $this->valorVenda = $valorVenda;
        return $this;
    }

    /**
     * @param float $desconto
     * @return Venda
     */
    public function setDesconto(float $desconto): Venda
    {
        $this->desconto = $desconto;
        return $this;
    }

    /**
     * @param float $acrescimo
     * @return Venda
     */
    public function setAcrescimo(float $acrescimo): Venda
    {
        $this->acrescimo = $acrescimo;
        return $this;
    }

    /**
     * @param float $valorFinal
     * @return Venda
     */
    public function setValorFinal(float $valorFinal): Venda
    {
        $this->valorFinal = $valorFinal;
        return $this;
    }

    /**
     * @param string $observacao
     * @return Venda
     */
    public function setObservacao(string $observacao): Venda
    {
        $this->observacao = $observacao;
        return $this;
    }

    /**
     * @param Pessoa $cliente
     * @return Venda
     */
    public function setCliente(Pessoa $cliente): Venda
    {
        $this->cliente = $cliente;
        return $this;
    }
}
