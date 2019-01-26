<?php

namespace App\Service\Cidade\Handler;

use App\Entity\Cidade;
use App\Entity\Estado;
use App\Entity\HistoricoOperacao;
use App\MensagemSistema;
use App\Repository\CidadeRepository;
use App\Repository\EstadoRepository as EstadoRepositoryAlias;
use App\Service\Cidade\Command\IncluirCidadeCommand;
use App\Service\HistoricoOperacaoService;
use Doctrine\ORM\EntityManager;

final class IncluirCidadeHandler
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
     * @var EstadoRepositoryAlias
     */
    private $estadoRepository;

    /**
     * @var HistoricoOperacaoService
     */
    private $log;

    /**
     * IncluirCidadeHandler constructor.
     * @param EntityManager $em
     * @param CidadeRepository $repository
     * @param EstadoRepositoryAlias $estadoRepository
     * @param HistoricoOperacaoService $log
     */
    public function __construct(
        EntityManager $em,
        CidadeRepository $repository,
        EstadoRepositoryAlias $estadoRepository,
        HistoricoOperacaoService $log
    ){
        $this->em = $em;
        $this->repository = $repository;
        $this->estadoRepository = $estadoRepository;
        $this->log = $log;
    }

    public function handle(IncluirCidadeCommand $command)
    {
        $this->em->beginTransaction();
        try {

             /** @var Estado $estado */
            $estado = $this->estadoRepository->find($command->getEstado());

            $entity = new Cidade (
                    $command->getCidade(),
                    $estado
            );

            $this->repository->add($entity);

            $this->log->addHistoricoCidade(
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
