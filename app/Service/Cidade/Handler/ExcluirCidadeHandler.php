<?php

namespace App\Service\Cidade\Handler;

use App\Entity\Cidade;
use App\Repository\CidadeRepository;
use App\Service\Cidade\Command\ExcluirCidadeCommand;
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
     * ExcluirCidadeHandler constructor.
     * @param EntityManager $em
     * @param CidadeRepository $repository
     */
    public function __construct(EntityManager $em, CidadeRepository $repository)
    {
        $this->em = $em;
        $this->repository = $repository;
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
                $this->repository->remove($entity);
            }
            $this->em->commit();
        } catch (\Exception $e) {
            $this->em->rollback();
            throw $e;
        }
    }
}
