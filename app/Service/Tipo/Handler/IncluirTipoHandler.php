<?php

namespace App\Service\Tipo\Handler;

use App\Entity\HistoricoOperacao;
use App\Entity\Tipo;
use App\MensagemSistema;
use App\Service\HistoricoOperacaoService;
use Doctrine\ORM\EntityManager;
use App\Repository\TipoRepository;
use App\Service\Tipo\Command\IncluirTipoCommand;

final class IncluirTipoHandler
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
     * IncluirTipoHandler constructor.
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


    public function handle(IncluirTipoCommand $command)
    {
        $this->em->beginTransaction();
        try {
            $entity = new Tipo (
                $command->getTipo()
            );
            $this->repository->add($entity);
            $this->log->addHistoricoTipo(
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
