<?php

namespace App\Service\Pessoa\Handler;

use App\Entity\HistoricoOperacao;
use App\MensagemSistema;
use App\Service\HistoricoOperacaoService;
use Doctrine\ORM\EntityManager;
use App\Entity\Pessoa;
use App\Repository\PessoaRepository;
use App\Service\Pessoa\Command\ExcluirPessoaCommand;

final class ExcluirPessoaHandler
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
     * @var HistoricoOperacaoService
     */
    private $log;

    /**
     * ExcluirPessoaHandler constructor.
     * @param EntityManager $em
     * @param PessoaRepository $repository
     * @param HistoricoOperacaoService $log
     */
    public function __construct(
        EntityManager $em,
        PessoaRepository $repository,
        HistoricoOperacaoService $log
    ){
        $this->em = $em;
        $this->repository = $repository;
        $this->log = $log;
    }


    public function handle(ExcluirPessoaCommand $command)
    {
        $this->em->beginTransaction();
        try {
            /**
             * @var Pessoa $entity
             */
            $entity = $this->repository->find($command->getId());
            if (is_numeric($entity->getId()) !== 0) {
                $this->log->addHistoricoPessoa(
                    HistoricoOperacao::TIPO_OP_DELETE,
                    $entity,
                    MensagemSistema::get('LOG003')
                );
                $this->repository->remove($entity);
            }
            $this->em->commit();
        } catch (\Exception $e) {
            $this->em->rollback();
            throw $e;
        }
    }
}
