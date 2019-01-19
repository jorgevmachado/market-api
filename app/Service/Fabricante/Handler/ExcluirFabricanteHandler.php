<?php

namespace App\Service\Fabricante\Handler;

use App\Entity\Fabricante;
use App\Repository\FabricanteRepository;
use App\Service\Fabricante\Command\ExcluirFabricanteCommand;
use Doctrine\ORM\EntityManager;

final class ExcluirFabricanteHandler
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var FabricanteRepository
     */
    private $fabricanteRepository;

    /**
     * ExcluirFabricanteHandler constructor.
     * @param EntityManager $em
     * @param FabricanteRepository $fabricanteRepository
     */
    public function __construct(EntityManager $em, FabricanteRepository $fabricanteRepository)
    {
        $this->em = $em;
        $this->fabricanteRepository = $fabricanteRepository;
    }

    public function handle(ExcluirFabricanteCommand $command)
    {
        $this->em->beginTransaction();
        try{
            /**
             * @var Fabricante $fabricante
             */
            $fabricante = $this->fabricanteRepository->find($command->getFabricanteId());
            if(is_numeric($fabricante->getId()) !== 0) {
                $this->fabricanteRepository->remove($fabricante);
            }
            $this->em->commit();
        } catch (\Exception $e) {
            $this->em->rollback();
            throw $e;
        }

    }


}