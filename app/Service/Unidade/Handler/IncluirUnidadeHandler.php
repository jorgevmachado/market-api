<?php


namespace App\Service\Unidade\Handler;

use App\Entity\Unidade;
use App\Repository\UnidadeRepository;
use App\Service\Unidade\Command\IncluirUnidadeCommand;
use Doctrine\ORM\EntityManager;

final class IncluirUnidadeHandler
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
    ){
        $this->em = $em;
        $this->repository = $repository;
    }

    public function handle(IncluirUnidadeCommand $command)
{
    $this->em->beginTransaction();
    try {
        $unidade = new Unidade(
            $command->getSigla(),
            $command->getUnidade()
        );
        $this->repository->add($unidade);
        $this->em->commit();
    } catch (\Exception $e) {
        $this->em->rollback();
        throw $e;
    }
}

}