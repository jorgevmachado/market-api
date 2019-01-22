<?php

namespace App\Service\Pessoa\Handler;

use App\Entity\Cidade;
use App\Repository\CidadeRepository;
use Doctrine\ORM\EntityManager;
use App\Entity\Pessoa;
use App\Repository\PessoaRepository;
use App\Service\Pessoa\Command\EditarPessoaCommand;

final class EditarPessoaHandler
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
     * EditarPessoaHandler constructor .
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

    public function handle(EditarPessoaCommand $command)
    {
        $this->em->beginTransaction();
        try {
            /**
             * @var Pessoa $entity
             */
            $entity = $this->repository->find($command->getId());

            /** @var Cidade $cidade */
            $cidade = $this->cidadeRepository->find($command->getCidade());
            if (is_numeric($entity->getId()) !== 0 && is_numeric($cidade->getId()) !== 0 ) {
                $entity
                    ->setPessoa($command->getPessoa())
                    ->setEndereco($command->getEndereco())
                    ->setBairro($command->getBairro())
                    ->setTelefone($command->getTelefone())
                    ->setEmail($command->getEmail())
                    ->setCidade($cidade);

                $this->repository->add($entity);
            }
            $this->em->commit();
        } catch (\Exception $e) {
            $this->em->rollback();
            throw $e;
        }
    }
}
