<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * @codeCoverageIgnore
 *
 * @ORM\Table(name="produto")
 * @ORM\Entity(repositoryClass="App\Repository\ProdutoRepository")
 */
class Produto
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(
     *     name="nu_produto",
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
     *     name="ds_produto",
     *     type="string",
     *     length=4000,
     *     options={"comment":"Descrição do produto."}
     * )
     */
    private $descricao;

    /**
     * @var int
     * @ORM\Column(
     *     name="qt_estoque",
     *     type="integer",
     *     length=38,
     *     options={"comment":"Quantidade de produtos em estoque."}
     * )
     */
    private $estoque;

    /**
     * @var float
     * @ORM\Column(
     *     name="vl_estoque",
     *     type="float",
     *     length=7,8,
     *     options={"comment":"Valor de custo do produto."}
     * )
     */
    private $custo;

    /**
     * @var float
     * @ORM\Column(
     *     name="vl_estoque",
     *     type="float",
     *     length=7,8,
     *     options={"comment":"Valor de venda do produto."}
     * )
     */
    private $venda;

    /**
     * @var Fabricante
     * @ORM\ManyToOne(targetEntity="Fabricante")
     * @ORM\JoinColumn(name="nu_fabricante", referencedColumnName="nu_fabricante")
     */
    private $fabricante;

    /**
     * @var Unidade
     * @ORM\ManyToOne(targetEntity="Unidade")
     * @ORM\JoinColumn(name="nu_unidade", referencedColumnName="nu_unidade")
     */
    private $unidade;

    /**
     * @var Tipo
     * @ORM\ManyToOne(targetEntity="Tipo")
     * @ORM\JoinColumn(name="nu_tipo", referencedColumnName="nu_tipo")
     */
    private $tipo;

    /**
     * Produto constructor.
     * @param string $descricao
     * @param int $estoque
     * @param float $custo
     * @param float $venda
     * @param Fabricante $fabricante
     * @param Unidade $unidade
     * @param Tipo $tipo
     */
    public function __construct(
        string $descricao,
        int $estoque,
        float $custo,
        float $venda,
        Fabricante $fabricante,
        Unidade $unidade,
        Tipo $tipo
    ){
        $this->descricao = $descricao;
        $this->estoque = $estoque;
        $this->custo = $custo;
        $this->venda = $venda;
        $this->fabricante = $fabricante;
        $this->unidade = $unidade;
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
     * @return string
     */
    public function getDescricao(): string
    {
        return $this->descricao;
    }

    /**
     * @return int
     */
    public function getEstoque(): int
    {
        return $this->estoque;
    }

    /**
     * @return float
     */
    public function getCusto(): float
    {
        return $this->custo;
    }

    /**
     * @return float
     */
    public function getVenda(): float
    {
        return $this->venda;
    }

    /**
     * @return Fabricante
     */
    public function getFabricante(): Fabricante
    {
        return $this->fabricante;
    }

    /**
     * @return Unidade
     */
    public function getUnidade(): Unidade
    {
        return $this->unidade;
    }

    /**
     * @return Tipo
     */
    public function getTipo(): Tipo
    {
        return $this->tipo;
    }

    /**
     * @param string $descricao
     * @return Produto
     */
    public function setDescricao(string $descricao): Produto
    {
        $this->descricao = $descricao;
        return $this;
    }

    /**
     * @param int $estoque
     * @return Produto
     */
    public function setEstoque(int $estoque): Produto
    {
        $this->estoque = $estoque;
        return $this;
    }

    /**
     * @param float $custo
     * @return Produto
     */
    public function setCusto(float $custo): Produto
    {
        $this->custo = $custo;
        return $this;
    }

    /**
     * @param float $venda
     * @return Produto
     */
    public function setVenda(float $venda): Produto
    {
        $this->venda = $venda;
        return $this;
    }

    /**
     * @param Fabricante $fabricante
     * @return Produto
     */
    public function setFabricante(Fabricante $fabricante): Produto
    {
        $this->fabricante = $fabricante;
        return $this;
    }

    /**
     * @param Unidade $unidade
     * @return Produto
     */
    public function setUnidade(Unidade $unidade): Produto
    {
        $this->unidade = $unidade;
        return $this;
    }

    /**
     * @param Tipo $tipo
     * @return Produto
     */
    public function setTipo(Tipo $tipo): Produto
    {
        $this->tipo = $tipo;
        return $this;
    }



}