<?php

namespace App\Service\Cidade\Handler;

use App\Entity\Cidade;
use App\Repository\CidadeRepository;
use App\Service\Cidade\Command\ExcluirCidadeCommand;
use Doctrine\ORM\EntityManager;

final class ExcluirCidadeHandler
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
     * ExcluirCidadeHandler constructor.
     * @param EntityManager $em
     * @param CidadeRepository $cidadeRepository
     */
    public function __construct(EntityManager $em, CidadeRepository $cidadeRepository)
    {
        $this->em = $em;
        $this->cidadeRepository = $cidadeRepository;
    }

    public function handle(ExcluirCidadeCommand $command)
    {
        $this->em->beginTransaction();
        try{
            /**
             * @var Cidade $cidade
             */
            $cidade = $this->cidadeRepository->find($command->getCidadeId());
            if(is_numeric($cidade->getId()) !== 0) {
                $this->cidadeRepository->remove($cidade);
            }
            $this->em->commit();
        } catch (\Exception $e) {
            $this->em->rollback();
            throw $e;
        }
    }
}