<?php

namespace App\Service\Produto\Command;

final class EditarProdutoCommand
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $descricao;

    /**
     * @var int
     */
    private $estoque;

    /**
     * @var float
     */
    private $custo;

    /**
     * @var float
     */
    private $venda;

    /**
     * @var int
     */
    private $fabricante;

    /**
     * @var int
     */
    private $unidade;

    /**
     * @var int
     */
    private $tipo;

    /**
     * EditarProdutoCommand constructor.
     * @param int $id
     * @param string $descricao
     * @param int $estoque
     * @param float $custo
     * @param float $venda
     * @param int $fabricante
     * @param int $unidade
     * @param int $tipo
     */
    public function __construct(
        int $id,
        string $descricao,
        int $estoque,
        float $custo,
        float $venda,
        int $fabricante,
        int $unidade,
        int $tipo
    ){
        $this->id = $id;
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
     * @return int
     */
    public function getFabricante(): int
    {
        return $this->fabricante;
    }

    /**
     * @return int
     */
    public function getUnidade(): int
    {
        return $this->unidade;
    }

    /**
     * @return int
     */
    public function getTipo(): int
    {
        return $this->tipo;
    }
}