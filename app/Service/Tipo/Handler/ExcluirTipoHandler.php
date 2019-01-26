<?php

namespace App\Service\Tipo\Handler;

use App\Entity\HistoricoOperacao;
use App\Entity\Tipo;
use App\MensagemSistema;
use App\Service\HistoricoOperacaoService;
use Doctrine\ORM\EntityManager;
use App\Repository\TipoRepository;
use App\Service\Tipo\Command\ExcluirTipoCommand;

final class ExcluirTipoHandler
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var TipoRepository
     */
    private $repository;

    /**
     * @var HistoricoOperacaoService
     */
    private $log;

    /**
     * IncluirCidadeHandler constructor.
     * @param EntityManager $em
     * @param TipoRepository $repository
     * @param HistoricoOperacaoService $log
     */
    public function __construct(
        EntityManager $em,
        TipoRepository $repository,
        HistoricoOperacaoService $log
    ){
        $this->em = $em;
        $this->repository = $repository;
        $this->log = $log;
    }

    public function handle(ExcluirTipoCommand $command)
    {

        $this->em->beginTransaction();
        try {
            /**
             * @var Tipo $entity
             */
            $entity = $this->repository->find($command->getId());
            if (is_numeric($entity->getId()) !== 0) {
                $this->log->addHistoricoTipo(
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
