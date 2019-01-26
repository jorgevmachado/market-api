<?php

namespace App\Service\Cidade\Handler;

use App\Entity\Cidade;
use App\Entity\HistoricoOperacao;
use App\MensagemSistema;
use App\Repository\CidadeRepository;
use App\Service\Cidade\Command\ExcluirCidadeCommand;
use App\Service\HistoricoOperacaoService;
use Doctrine\ORM\EntityManager;

final class ExcluirCidadeHandler
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var CidadeRepository
     */
    private $repository;

    /**
     * @var HistoricoOperacaoService
     */
    private $log;

    /**
     * ExcluirCidadeHandler constructor.
     * @param EntityManager $em
     * @param CidadeRepository $repository
     * @param HistoricoOperacaoService $log
     */
    public function __construct(
        EntityManager $em,
        CidadeRepository $repository,
        HistoricoOperacaoService $log)
    {
        $this->em = $em;
        $this->repository = $repository;
        $this->log = $log;
    }

    public function handle(ExcluirCidadeCommand $command)
    {
        $this->em->beginTransaction();
        try{
            /**
             * @var Cidade $entity
             */
            $entity = $this->repository->find($command->getId());
            if(is_numeric($entity->getId()) !== 0) {
                $this->log->addHistoricoCidade(
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
