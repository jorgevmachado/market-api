<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * @codeCoverageIgnore
 *
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
     *     name="dt_emissao",
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

    /**
     * Conta constructor.
     * @param \DateTime $dataEmissao
     * @param \DateTime $dataVencimento
     * @param float $valorConta
     * @param string $pago
     * @param Pessoa $cliente
     */
    public function __construct(
        \DateTime $dataEmissao,
        \DateTime $dataVencimento,
        float $valorConta,
        string $pago,
        Pessoa $cliente
    )
    {
        $this->dataEmissao = $dataEmissao;
        $this->dataVencimento = $dataVencimento;
        $this->valorConta = $valorConta;
        $this->pago = $pago;
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
    public function getDataEmissao(): \DateTime
    {
        return $this->dataEmissao;
    }

    /**
     * @return \DateTime
     */
    public function getDataVencimento(): \DateTime
    {
        return $this->dataVencimento;
    }

    /**
     * @return float
     */
    public function getValorConta(): float
    {
        return $this->valorConta;
    }

    /**
     * @return string
     */
    public function getPago(): string
    {
        return $this->pago;
    }

    /**
     * @return Pessoa
     */
    public function getCliente(): Pessoa
    {
        return $this->cliente;
    }

    /**
     * @param \DateTime $dataEmissao
     * @return Conta
     */
    public function setDataEmissao(\DateTime $dataEmissao): Conta
    {
        $this->dataEmissao = $dataEmissao;
        return $this;
    }

    /**
     * @param \DateTime $dataVencimento
     * @return Conta
     */
    public function setDataVencimento(\DateTime $dataVencimento): Conta
    {
        $this->dataVencimento = $dataVencimento;
        return $this;
    }

    /**
     * @param float $valorConta
     * @return Conta
     */
    public function setValorConta(float $valorConta): Conta
    {
        $this->valorConta = $valorConta;
        return $this;
    }

    /**
     * @param string $pago
     * @return Conta
     */
    public function setPago(string $pago): Conta
    {
        $this->pago = $pago;
        return $this;
    }

    /**
     * @param Pessoa $cliente
     * @return Conta
     */
    public function setCliente(Pessoa $cliente): Conta
    {
        $this->cliente = $cliente;
        return $this;
    }
}
