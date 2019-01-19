<?php

namespace App\Service\Cidade\Handler;


use App\Entity\Cidade;
use App\Entity\Estado;
use App\Repository\CidadeRepository;
use App\Repository\EstadoRepository;
use App\Service\Cidade\Command\EditarCidadeCommand;
use Doctrine\ORM\EntityManager;

final class EditarCidadeHandler
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
    private  $estadoRepository;

    /**
     * EditarCidadeHandler constructor.
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

    public function handle(EditarCidadeCommand $command)
    {
        $this->em->beginTransaction();
        try {
            /**
             * @var Cidade $cidade
             */
            $cidade = $this->cidadeRepository->find($command->getCidadeId());

            /**
             * @var Estado $estado
             */
            $estado = $this->estadoRepository->find($command->getEstadoId());

            if((is_numeric($cidade->getId()) !== 0) && (is_numeric($estado->getId()) != 0)) {
                $cidade
                    ->setCidade($command->getCidade())
                    ->setEstado($estado);

                $this->cidadeRepository->add($cidade);
                $this->em->commit();
            }

        }catch (\Exception $e) {
            $this->em->rollback();
            throw $e;
        }
    }
}