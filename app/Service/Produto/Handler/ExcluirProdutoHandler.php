<?php

namespace App\Service\Produto\Handler;

use App\Entity\HistoricoOperacao;
use App\MensagemSistema;
use App\Service\HistoricoOperacaoService;
use Doctrine\ORM\EntityManager;
use App\Entity\Produto;
use App\Repository\ProdutoRepository;
use App\Service\Produto\Command\ExcluirProdutoCommand;

final class ExcluirProdutoHandler
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
     * @var HistoricoOperacaoService
     */
    private $log;

    /**
     * ExcluirProdutoHandler constructor.
     * @param EntityManager $em
     * @param ProdutoRepository $repository
     * @param HistoricoOperacaoService $log
     */
    public function __construct(
        EntityManager $em,
        ProdutoRepository $repository,
        HistoricoOperacaoService $log
    ){
        $this->em = $em;
        $this->repository = $repository;
        $this->log = $log;
    }


    public function handle(ExcluirProdutoCommand $command)
    {

        $this->em->beginTransaction();
        try {
            /**
             * @var Produto $entity
             */
            $entity = $this->repository->find($command->getId());
            if (is_numeric($entity->getId()) !== 0) {
                $this->log->addHistoricoProduto(
                    HistoricoOperacao::TIPO_OP_DELETE,
                    $entity,
                    MensagemSistema::get('LOG003')
                );
                $this->repository->remove($entity);
            }
            $this->em->commit();
        } catch (\Exception $e) {
            $this->em->rollback();
            throw $e;
        }
    }
}
