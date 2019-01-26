<?php

namespace App\Service\Produto\Handler;

use App\Entity\Fabricante;
use App\Entity\HistoricoOperacao;
use App\Entity\Tipo;
use App\Entity\Unidade;
use App\MensagemSistema;
use App\Repository\FabricanteRepository;
use App\Repository\TipoRepository;
use App\Repository\UnidadeRepository;
use App\Service\HistoricoOperacaoService;
use Doctrine\ORM\EntityManager;
use App\Entity\Produto;
use App\Repository\ProdutoRepository;
use App\Service\Produto\Command\IncluirProdutoCommand;

final class IncluirProdutoHandler
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var ProdutoRepository
     */
    private $repository;

    /**
     * @var FabricanteRepository
     */
    private $fabricanteRepository;

    /**
     * @var UnidadeRepository
     */
    private $unidadeRepository;

    /**
     * @var TipoRepository
     */
    private $tipoRepository;

    /**
     * @var HistoricoOperacaoService
     */
    private $log;

    /**
     * IncluirProdutoHandler constructor.
     * @param EntityManager $em
     * @param ProdutoRepository $repository
     * @param FabricanteRepository $fabricanteRepository
     * @param UnidadeRepository $unidadeRepository
     * @param TipoRepository $tipoRepository
     */
    public function __construct(
        EntityManager $em,
        ProdutoRepository $repository,
        FabricanteRepository $fabricanteRepository,
        UnidadeRepository $unidadeRepository,
        TipoRepository $tipoRepository,
        HistoricoOperacaoService $log
    ){
        $this->em = $em;
        $this->repository = $repository;
        $this->fabricanteRepository = $fabricanteRepository;
        $this->unidadeRepository = $unidadeRepository;
        $this->tipoRepository = $tipoRepository;
        $this->log = $log;
    }

    public function handle(IncluirProdutoCommand $command)
    {

        $this->em->beginTransaction();
        try {

            /**
             * @var Fabricante $fabricante
             */
            $fabricante = $this->fabricanteRepository->find($command->getFabricante());

            /**
             * @var Unidade $unidade
             */
            $unidade = $this->unidadeRepository->find($command->getUnidade());

            /**
             * @var Tipo $tipo
             */
            $tipo = $this->tipoRepository->find($command->getTipo());

            $entity = new Produto(
              $command->getDescricao(),
              $command->getEstoque(),
              $command->getCusto(),
              $command->getVenda(),
              $fabricante,
              $unidade,
              $tipo
            );
            $this->repository->add($entity);
            $this->log->addHistoricoProduto(
                HistoricoOperacao::TIPO_OP_INSERT,
                $entity,
                MensagemSistema::get('LOG001')
            );
            $this->em->commit();
        } catch (\Exception $e) {
            $this->em->rollback();
            throw $e;
        }
    }
}
