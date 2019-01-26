<?php

namespace App\Service\Fabricante\Handler;

use App\Entity\Fabricante;
use App\Entity\HistoricoOperacao;
use App\MensagemSistema;
use App\Repository\FabricanteRepository;
use App\Service\Fabricante\Command\ExcluirFabricanteCommand;
use App\Service\HistoricoOperacaoService;
use Doctrine\ORM\EntityManager;

final class ExcluirFabricanteHandler
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var FabricanteRepository
     */
    private $repository;

    /**
     * @var HistoricoOperacaoService
     */
    private $log;

    /**
     * ExcluirFabricanteHandler constructor.
     * @param EntityManager $em
     * @param FabricanteRepository $repository
     * @param HistoricoOperacaoService $log
     */
    public function __construct(
        EntityManager $em,
        FabricanteRepository $repository,
        HistoricoOperacaoService $log
    ){
        $this->em = $em;
        $this->repository = $repository;
        $this->log = $log;
    }

    public function handle(ExcluirFabricanteCommand $command)
    {
        $this->em->beginTransaction();
        try{
            /**
             * @var Fabricante $entity
             */
            $entity = $this->repository->find($command->getFabricanteId());
            if(is_numeric($entity->getId()) !== 0) {
                $this->log->addHistoricoFabricante(
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
