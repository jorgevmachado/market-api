<?php

namespace App\Service\Cidade\Handler;

use App\Entity\Cidade;
use App\Entity\Estado;
use App\Repository\CidadeRepository;
use App\Repository\EstadoRepository;
use App\Service\Cidade\Command\IncluirCidadeCommand;
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
     * @var EstadoRepository
     */
    private $estadoRepository;

    /**
     * IncluirCidadeHandler constructor.
     * @param EntityManager $em
     * @param CidadeRepository $repository
     * @param EstadoRepository $estadoRepository
     */
    public function __construct(
        EntityManager $em,
        CidadeRepository $repository,
        EstadoRepository $estadoRepository
    ){
        $this->em = $em;
        $this->repository = $repository;
        $this->estadoRepository = $estadoRepository;
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
            $this->em->commit();
        } catch (\Exception $e) {
            $this->em->rollback();
            throw $e;
        }
    }
}
