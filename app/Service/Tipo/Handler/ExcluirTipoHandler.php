<?php

namespace App\Service\Tipo\Handler;

use App\Entity\Tipo;
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
     * IncluirCidadeHandler constructor.
     * @param EntityManager $em
     * @param TipoRepository $repository
     */
    public function __construct(
        EntityManager $em,
        TipoRepository $repository)
    {
        $this->em = $em;
        $this->repository = $repository;
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
                $this->repository->remove($entity);
            }
            $this->em->commit();
        } catch (\Exception $e) {
            $this->em->rollback();
            throw $e;
        }
    }
}