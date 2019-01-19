<?php

namespace App\Service\Cidade\Handler;


use App\Entity\Cidade;
use App\Entity\Estado;
use App\Repository\CidadeRepository;
use App\Repository\EstadoRepository;
use App\Service\Cidade\Command\IncluirCidadeCommand;
use Doctrine\ORM\EntityManager;

final class IncluirCidadeHandler
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var CidadeRepository
     */
    private $cidadeRepository;

    /**
     * @var EstadoRepository
     */
    private $estadoRepository;

    /**
     * IncluirCidadeHandler constructor.
     * @param EntityManager $em
     * @param CidadeRepository $cidadeRepository
     * @param EstadoRepository $estadoRepository
     */
    public function __construct(
        EntityManager $em,
        CidadeRepository $cidadeRepository,
        EstadoRepository $estadoRepository
    ){
        $this->em = $em;
        $this->cidadeRepository = $cidadeRepository;
        $this->estadoRepository = $estadoRepository;
    }

    public function handle(IncluirCidadeCommand $command)
    {
        $this->em->beginTransaction();
        try {

            $estado = $this->em->getReference(Estado::class,$command->getEstado());
            $cidade = new Cidade (
                    $command->getCidade(),
                    $estado
            );
            $this->cidadeRepository->add($cidade);
            $this->em->commit();
            return $cidade;
        } catch (\Exception $e) {
            $this->em->rollback();
            throw $e;
        }
    }

}