<?php

namespace App\Service\Fabricante\Handler;


use App\Entity\Fabricante;
use App\Repository\FabricanteRepository;
use App\Service\Fabricante\Command\EditarFabricanteCommand;
use Doctrine\ORM\EntityManager;

final class EditarFabricanteHandler
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
     * EditarFabricanteHandler constructor.
     * @param EntityManager $em
     * @param FabricanteRepository $fabricanteRepository
     */
    public function __construct(
        EntityManager $em,
        FabricanteRepository $fabricanteRepository
    ){
        $this->em = $em;
        $this->fabricanteRepository = $fabricanteRepository;
    }

    public function handle(EditarFabricanteCommand $command)
    {
        $this->em->beginTransaction();
        try {
            /**
             * @var Fabricante $fabricante
             */
            $fabricante = $this->fabricanteRepository->find($command->getFabricanteId());
            if(is_numeric($fabricante->getId()) !== 0) {
                $fabricante
                    ->setFabricante($command->getFabricante())
                    ->setSite($command->getSite());
                $this->fabricanteRepository->add($fabricante);
                $this->em->commit();
            }
        }catch (\Exception $e) {
            $this->em->rollback();
            throw $e;
        }
    }
}