<?php

namespace App\Service\Produto\Handler;

use Doctrine\ORM\EntityManager;
use App\Entity\Produto;
use App\Repository\ProdutoRepository;
use App\Service\Produto\Command\ExcluirProdutoCommand;

final class ExcluirProdutoHandler
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var ProdutoRepository
     */
    private $repository;

    /**
     * IncluirCidadeHandler constructor.
     * @param EntityManager $em
     * @param ProdutoRepository $repository
     */
    public function __construct(
        EntityManager $em,
        ProdutoRepository $repository)
    {
        $this->em = $em;
        $this->repository = $repository;
    }

    public function handle(ExcluirProdutoCommand $command)
    {

        $this->em->beginTransaction();
        try {
            /**
             * @var Produto $entity
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