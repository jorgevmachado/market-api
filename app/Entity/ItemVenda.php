<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
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

}
