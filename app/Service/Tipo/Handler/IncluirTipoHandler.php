<?php

namespace App\Service\Tipo\Handler;

use App\Entity\Tipo;
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
     * IncluirTipoHandler constructor.
     * @param EntityManager $em
     * @param TipoRepository $repository
     */
    public function __construct(
        EntityManager $em,
        TipoRepository $repository
    ){
        $this->em = $em;
        $this->repository = $repository;
    }

    public function handle(IncluirTipoCommand $command)
    {
        $this->em->beginTransaction();
        try {
            $tipo = new Tipo (
                $command->getTipo()
            );
            $this->repository->add($tipo);
            $this->em->commit();
        } catch (\Exception $e) {
            $this->em->rollback();
            throw $e;
        }
    }
}