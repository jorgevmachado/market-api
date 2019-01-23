<?php

namespace App\Service\Cidade\Handler;


use App\Entity\Cidade;
use App\Entity\Estado;
use App\Repository\CidadeRepository;
use App\Repository\EstadoRepository;
use App\Service\Cidade\Command\EditarCidadeCommand;
use Doctrine\ORM\EntityManager;

final class EditarCidadeHandler
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
    private  $estadoRepository;

    /**
     * EditarCidadeHandler constructor.
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

    public function handle(EditarCidadeCommand $command)
    {
        $this->em->beginTransaction();
        try {
            /**
             * @var Cidade $entity
             */
            $entity = $this->repository->find($command->getId());

            /**
             * @var Estado $estado
             */
            $estado = $this->estadoRepository->find($command->getEstadoId());

            if((is_numeric($entity->getId()) !== 0) && (is_numeric($estado->getId()) != 0)) {
                $entity
                    ->setCidade($command->getCidade())
                    ->setEstado($estado);

                $this->repository->add($entity);
                $this->em->commit();
            }

        }catch (\Exception $e) {
            $this->em->rollback();
            throw $e;
        }
    }
}
