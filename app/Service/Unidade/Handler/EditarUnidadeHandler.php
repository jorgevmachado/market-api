<?php

namespace App\Service\Unidade\Handler;

use App\Entity\Unidade;
use App\Repository\ UnidadeRepository;
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
     * IncluirCidadeHandler constructor.
     * @param EntityManager $em
     * @param UnidadeRepository $repository
     */
    public function __construct(
        EntityManager $em,
        UnidadeRepository $repository
    )
    {
        $this->em = $em;
        $this->repository = $repository;
    }

    public function handle(EditarUnidadeCommand $command)
    {
        $this->em->beginTransaction();
        try {
            /**
             * @var Unidade $unidade
             */
            $unidade = $this->repository->find($command->getId());
            if(is_numeric($unidade->getId()) !== 0) {
                $unidade
                    ->setSigla($command->getSigla())
                    ->setUnidade($command->getUnidade());
                $this->repository->add($unidade);

                $this->em->commit();
            }
        } catch (\Exception $e) {
            $this->em->rollback();
            throw $e;
        }
    }
}