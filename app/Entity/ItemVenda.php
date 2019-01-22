<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * @codeCoverageIgnore
 *
 * @ORM\Table(name="item_venda")
 * @ORM\Entity(repositoryClass="App\Repository\ItemVendaRepository")
 */
class ItemVenda
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(
     *     name="nu_item_venda",
     *     length=10,
     *     type="integer",
     *     options={"comment":"Codigo chave da tabela, PK Identity identifica o registro unico"}
     * )
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="App\Bridge\Doctrine\ORM\Id\OracleIdentityGenerator")
     */
    private $id;

    /**
     * @var integer
     * @ORM\Column(
     *     name="nu_quantidade",
     *     length=33,
     *     type="integer",
     *     options={"comment":"Quantidade de itens de uma venda"}
     * )
     */
    private $quantidade;
    /**
     * @var float
     * @ORM\Column(
     *     name="vl_preco",
     *     type="decimal",
     *     options={"comment":"Valor do preço de um item de venda."}
     * )
     */
    private $preco;

    /**
     * @var Produto
     * @ORM\ManyToOne(targetEntity="Produto")
     * @ORM\JoinColumn(name="nu_produto", referencedColumnName="nu_produto")
     */
    private $produto;

    /**
     * @var Venda
     * @ORM\ManyToOne(targetEntity="Venda")
     * @ORM\JoinColumn(name="nu_venda", referencedColumnName="nu_venda")
     */
    private $venda;

    /**
     * ItemVenda constructor.
     * @param int $quantidade
     * @param float $preco
     * @param Produto $produto
     * @param Venda $venda
     */
    public function __construct(
        int $quantidade,
        float $preco,
        Produto $produto,
        Venda $venda
    ){
        $this->quantidade = $quantidade;
        $this->preco = $preco;
        $this->produto = $produto;
        $this->venda = $venda;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getQuantidade(): int
    {
        return $this->quantidade;
    }

    /**
     * @return float
     */
    public function getPreco(): float
    {
        return $this->preco;
    }

    /**
     * @return Produto
     */
    public function getProduto(): Produto
    {
        return $this->produto;
    }

    /**
     * @return Venda
     */
    public function getVenda(): Venda
    {
        return $this->venda;
    }

    /**
     * @param int $quantidade
     */
    public function setQuantidade(int $quantidade): void
    {
        $this->quantidade = $quantidade;
    }

    /**
     * @param float $preco
     */
    public function setPreco(float $preco): void
    {
        $this->preco = $preco;
    }

    /**
     * @param Produto $produto
     */
    public function setProduto(Produto $produto): void
    {
        $this->produto = $produto;
    }

    /**
     * @param Venda $venda
     */
    public function setVenda(Venda $venda): void
    {
        $this->venda = $venda;
    }
}
