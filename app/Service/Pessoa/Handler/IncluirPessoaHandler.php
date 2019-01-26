<?php

namespace App\Service\Pessoa\Handler;

use App\Entity\Cidade;
use App\Repository\CidadeRepository;
use Doctrine\ORM\EntityManager;
use App\Entity\Pessoa;
use App\Repository\PessoaRepository;
use App\Service\Pessoa\Command\IncluirPessoaCommand;

final class IncluirPessoaHandler
{
    /**
     * @var EntityManager
     */
    private $em;
    /**
     * @var PessoaRepository
     */
    private $repository;

    /**
     * @var CidadeRepository
     */
    private $cidadeRepository;

    /**
     * IncluirPessoaHandler constructor .
     * @param EntityManager $em
     * @param PessoaRepository $repository
     * @param CidadeRepository $cidadeRepository
     */
    public function __construct(
        EntityManager $em,
        PessoaRepository $repository,
        CidadeRepository $cidadeRepository
    ){
        $this->em = $em;
        $this->repository = $repository;
        $this->cidadeRepository = $cidadeRepository;
    }

    public function handle(IncluirPessoaCommand $command)
    {
        $this->em->beginTransaction();
        try {

            /** @var Cidade $cidade */
            $cidade =  $this->cidadeRepository->find($command->getCidade());
            /**
             * @var Pessoa $entity
             */
            $entity = new Pessoa(
                $command->getNome(),
                $command->getEndereco(),
                $command->getBairro(),
                $command->getTelefone(),
                $command->getEmail(),
                $cidade
            );
            $this->repository->add($entity);
            $this->em->commit();
        } catch (\Exception $e) {
            $this->em->rollback();
            throw $e;
        }
    }
}
