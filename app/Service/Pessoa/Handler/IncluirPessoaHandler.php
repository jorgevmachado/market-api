<?php

namespace App\Service\Pessoa\Handler;

use App\Entity\Cidade;
use App\Entity\HistoricoOperacao;
use App\MensagemSistema;
use App\Repository\CidadeRepository;
use App\Service\HistoricoOperacaoService;
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
     * @var HistoricoOperacaoService
     */
    private $log;

    /**
     * IncluirPessoaHandler constructor.
     * @param EntityManager $em
     * @param PessoaRepository $repository
     * @param CidadeRepository $cidadeRepository
     * @param HistoricoOperacaoService $log
     */
    public function __construct(
        EntityManager $em,
        PessoaRepository $repository,
        CidadeRepository $cidadeRepository,
        HistoricoOperacaoService $log
    ){
        $this->em = $em;
        $this->repository = $repository;
        $this->cidadeRepository = $cidadeRepository;
        $this->log = $log;
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
            $this->log->addHistoricoPessoa(
                HistoricoOperacao::TIPO_OP_INSERT,
                $entity,
                MensagemSistema::get('LOG001')
            );
            $this->em->commit();
        } catch (\Exception $e) {
            $this->em->rollback();
            throw $e;
        }
    }
}
