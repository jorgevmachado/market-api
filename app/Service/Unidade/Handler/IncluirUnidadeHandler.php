<?php


namespace App\Service\Unidade\Handler;

use App\Entity\HistoricoOperacao;
use App\Entity\Unidade;
use App\MensagemSistema;
use App\Repository\UnidadeRepository;
use App\Service\HistoricoOperacaoService;
use App\Service\Unidade\Command\IncluirUnidadeCommand;
use Doctrine\ORM\EntityManager;

final class IncluirUnidadeHandler
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var UnidadeRepository
     */
    private $repository;

    /**
     * @var HistoricoOperacaoService
     */
    private $log;

    /**
     * IncluirUnidadeHandler constructor.
     * @param EntityManager $em
     * @param UnidadeRepository $repository
     * @param HistoricoOperacaoService $log
     */
    public function __construct(
        EntityManager $em,
        UnidadeRepository $repository,
        HistoricoOperacaoService $log
    ){
        $this->em = $em;
        $this->repository = $repository;
        $this->log = $log;
    }


    public function handle(IncluirUnidadeCommand $command)
{
    $this->em->beginTransaction();
    try {
        $entity = new Unidade(
            $command->getSigla(),
            $command->getUnidade()
        );
        $this->repository->add($entity);
        $this->log->addHistoricoUnidade(
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
