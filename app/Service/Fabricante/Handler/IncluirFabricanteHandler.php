<?php

namespace App\Service\Fabricante\Handler;


use App\Entity\Fabricante;
use App\Entity\HistoricoOperacao;
use App\MensagemSistema;
use App\Repository\FabricanteRepository;
use App\Service\Fabricante\Command\IncluirFabricanteCommand;
use App\Service\HistoricoOperacaoService;
use Doctrine\ORM\EntityManager;

final class IncluirFabricanteHandler
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
     * IncluirFabricanteHandler constructor.
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

    public function handle(IncluirFabricanteCommand $command)
    {
        $this->em->beginTransaction();
        try {
            
            $entity = new Fabricante (
                    $command->getFabricante(),
                    $command->getSite()
            );
            $this->repository->add($entity);
            
            $this->log->addHistoricoFabricante(
                HistoricoOperacao::TIPO_OP_INSERT,
                $entity,
                MensagemSistema::get('LOG001')
            );
            
            $this->em->commit();
            return $entity;
        } catch (\Exception $e) {
            $this->em->rollback();
            throw $e;
        }
    }
}
