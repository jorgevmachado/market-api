<?php

namespace App\Service\Tipo\Handler;

use App\Entity\Tipo;
use Doctrine\ORM\EntityManager;
use App\Repository\TipoRepository;
use App\Service\Tipo\Command\EditarTipoCommand;

final class EditarTipoHandler
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
        TipoRepository $repository
    )
    {
        $this->em = $em;
        $this->repository = $repository;
    }

    public function handle(EditarTipoCommand $command)
    {

        $this->em->beginTransaction();
        try {
            /**
             * @var Tipo $tipo
             */
            $tipo = $this->repository->find($command->getId());
            if ($tipo->getId() != 0) {
                $tipo->setTipo($command->getTipo());
                $this->repository->add($tipo);
                $this->em->commit();
            }
        } catch (\Exception $e) {
            $this->em->rollback();
            throw $e;
        }
    }
}