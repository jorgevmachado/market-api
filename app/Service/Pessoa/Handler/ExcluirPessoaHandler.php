<?php

namespace App\Service\Pessoa\Handler;

use Doctrine\ORM\EntityManager;
use App\Entity\Pessoa;
use App\Repository\PessoaRepository;
use App\Service\Pessoa\Command\ExcluirPessoaCommand;

final class ExcluirPessoaHandler
{
    /**
     * @var EntityManager
     */
    private $em;
    /**
     * @var PessoaRepository
     */
    private $repository;

    /**
     * ExcluirPessoaHandler constructor .
     * @param EntityManager $em
     * @param PessoaRepository $repository
     */
    public function __construct(
        EntityManager $em,
        PessoaRepository $repository)
    {
        $this->em = $em;
        $this->repository = $repository;
    }

    public function handle(ExcluirPessoaCommand $command)
    {
        $this->em->beginTransaction();
        try {
            /**
             * @var Pessoa $entity
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
