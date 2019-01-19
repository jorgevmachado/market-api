<?php

namespace App\Service\Fabricante\Handler;


use App\Entity\Fabricante;
use App\Repository\FabricanteRepository;
use App\Service\Fabricante\Command\IncluirFabricanteCommand;
use Doctrine\ORM\EntityManager;

final class IncluirFabricanteHandler
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
     * IncluirFabricanteHandler constructor.
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

    public function handle(IncluirFabricanteCommand $command)
    {
        $this->em->beginTransaction();
        try {
            
            $fabricante = new Fabricante (
                    $command->getFabricante(),
                    $command->getSite()
            );
            $this->fabricanteRepository->add($fabricante);
            $this->em->commit();
            return $fabricante;
        } catch (\Exception $e) {
            $this->em->rollback();
            throw $e;
        }
    }
}