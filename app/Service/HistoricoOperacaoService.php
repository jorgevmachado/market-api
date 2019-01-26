<?php

namespace App\Service;

use App\Entity\Cidade;
use App\Entity\Fabricante;
use App\Entity\HistoricoOperacao;
use App\Entity\Pessoa;
use App\Entity\Produto;
use App\Entity\Tipo;
use App\Entity\Unidade;
use App\Entity\Venda;
use App\Repository\HistoricoOperacaoRepository;

class HistoricoOperacaoService
{
    /**
     * @var HistoricoOperacaoRepository
     */
    protected $historicoOperacaoRepository;

    /**
     * HistoricoOperacaoService constructor.
     * @param HistoricoOperacaoRepository $historicoOperacaoRepository
     */
    public function __construct(HistoricoOperacaoRepository $historicoOperacaoRepository)
    {
        $this->historicoOperacaoRepository = $historicoOperacaoRepository;
    }

    /**
     * @param string $tipoOp
     * @param Cidade $entity
     * @param string|null $justificativa
     * @param string|null $coluna
     * @param string|null $valorColuna
     * @return HistoricoOperacao
     * @throws \Exception
     */
    public function addHistoricoCidade(
        string $tipoOp,
        Cidade $entity,
        string $justificativa = null,
        string $coluna = null,
        string $valorColuna = null
    ){
     return $this->persistHistoricoOperacao(
         'cidade',
         $tipoOp,
         $entity->getId(),
         $justificativa,
         $coluna,
         $valorColuna
     );
    }

    /**
     * @param string $tipoOp
     * @param Fabricante $entity
     * @param string|null $justificativa
     * @param string|null $coluna
     * @param string|null $valorColuna
     * @return HistoricoOperacao
     * @throws \Exception
     */
    public function addHistoricoFabricante(
        string $tipoOp,
        Fabricante $entity,
        string $justificativa = null,
        string $coluna = null,
        string $valorColuna = null
    ){
        return $this->persistHistoricoOperacao(
            'fabricante',
            $tipoOp,
            $entity->getId(),
            $justificativa,
            $coluna,
            $valorColuna
        );
    }

    /**
     * @param string $tipoOp
     * @param Unidade $entity
     * @param string|null $justificativa
     * @param string|null $coluna
     * @param string|null $valorColuna
     * @return HistoricoOperacao
     * @throws \Exception
     */
    public function addHistoricoUnidade(
        string $tipoOp,
        Unidade $entity,
        string $justificativa = null,
        string $coluna = null,
        string $valorColuna = null
    ){
        return $this->persistHistoricoOperacao(
            'unidade',
            $tipoOp,
            $entity->getId(),
            $justificativa,
            $coluna,
            $valorColuna
        );
    }

    /**
     * @param string $tipoOp
     * @param Tipo $entity
     * @param string|null $justificativa
     * @param string|null $coluna
     * @param string|null $valorColuna
     * @return HistoricoOperacao
     * @throws \Exception
     */
    public function addHistoricoTipo(
        string $tipoOp,
        Tipo $entity,
        string $justificativa = null,
        string $coluna = null,
        string $valorColuna = null
    ){
        return $this->persistHistoricoOperacao(
            'tipo',
            $tipoOp,
            $entity->getId(),
            $justificativa,
            $coluna,
            $valorColuna
        );
    }

    /**
     * @param string $tipoOp
     * @param Produto $entity
     * @param string|null $justificativa
     * @param string|null $coluna
     * @param string|null $valorColuna
     * @return HistoricoOperacao
     * @throws \Exception
     */
    public function addHistoricoProduto(
        string $tipoOp,
        Produto $entity,
        string $justificativa = null,
        string $coluna = null,
        string $valorColuna = null
    ){
        return $this->persistHistoricoOperacao(
            'produto',
            $tipoOp,
            $entity->getId(),
            $justificativa,
            $coluna,
            $valorColuna
        );
    }

    /**
     * @param string $tipoOp
     * @param Pessoa $entity
     * @param string|null $justificativa
     * @param string|null $coluna
     * @param string|null $valorColuna
     * @return HistoricoOperacao
     * @throws \Exception
     */
    public function addHistoricoPessoa(
        string $tipoOp,
        Pessoa $entity,
        string $justificativa = null,
        string $coluna = null,
        string $valorColuna = null
    ){
        return $this->persistHistoricoOperacao(
            'pessoa',
            $tipoOp,
            $entity->getId(),
            $justificativa,
            $coluna,
            $valorColuna
        );
    }

    /**
     * @param string $tipoOp
     * @param Venda $entity
     * @param string|null $justificativa
     * @param string|null $coluna
     * @param string|null $valorColuna
     * @return HistoricoOperacao
     * @throws \Exception
     */
    public function addHistoricoVenda(
        string $tipoOp,
        Venda $entity,
        string $justificativa = null,
        string $coluna = null,
        string $valorColuna = null
    ){
        return $this->persistHistoricoOperacao(
            'venda',
            $tipoOp,
            $entity->getId(),
            $justificativa,
            $coluna,
            $valorColuna
        );
    }

    /**
     * @param string $tabela
     * @param string $tipoOp
     * @param int $idRegistro
     * @param string|null $justificativa
     * @param string|null $coluna
     * @param string|null $valorColuna
     * @return HistoricoOperacao
     * @throws \Exception
     */
    private function persistHistoricoOperacao(
        string $tabela,
        string $tipoOp,
        int $idRegistro,
        string $justificativa = null,
        string $coluna = null,
        string $valorColuna = null
    ) {
        $entity = new HistoricoOperacao(
            $tabela,
            $tipoOp,
            new \DateTime(),
            $idRegistro,
            $justificativa,
            $coluna,
            $valorColuna
        );
        $this->historicoOperacaoRepository->add($entity);
        return $entity;
    }
}
