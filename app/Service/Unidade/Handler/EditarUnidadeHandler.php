<?php

namespace App\Service\Unidade\Handler;

use App\Entity\HistoricoOperacao;
use App\Entity\Unidade;
use App\MensagemSistema;
use App\Repository\ UnidadeRepository;
use App\Service\HistoricoOperacaoService;
use App\Service\Unidade\Command\EditarUnidadeCommand;
use Doctrine\ORM\EntityManager;

final class EditarUnidadeHandler
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var UnidadeRepository
     */
    private $repository;

    /**
     * @var HistoricoOperacaoService
     */
    private $log;

    /**
     * IncluirCidadeHandler constructor.
     * @param EntityManager $em
     * @param UnidadeRepository $repository
     * @param HistoricoOperacaoService $log
     */
    public function __construct(
        EntityManager $em,
        UnidadeRepository $repository,
        HistoricoOperacaoService $log
    ){
        $this->em = $em;
        $this->repository = $repository;
        $this->log = $log;
    }

    public function handle(EditarUnidadeCommand $command)
    {
        $this->em->beginTransaction();
        try {
            /**
             * @var Unidade $entity
             */
            $entity = $this->repository->find($command->getId());
            if(is_numeric($entity->getId()) !== 0) {
                $entity
                    ->setSigla($command->getSigla())
                    ->setUnidade($command->getUnidade());
                $this->repository->add($entity);
                $this->log->addHistoricoUnidade(
                    HistoricoOperacao::TIPO_OP_UPDATE,
                    $entity,
                    MensagemSistema::get('LOG002')
                );
                $this->em->commit();
            }
        } catch (\Exception $e) {
            $this->em->rollback();
            throw $e;
        }
    }
}
