<?php

namespace App\Service\Produto\Handler;

use App\Entity\Fabricante;
use App\Entity\Tipo;
use App\Entity\Unidade;
use App\Repository\FabricanteRepository;
use App\Repository\TipoRepository;
use App\Repository\UnidadeRepository;
use Doctrine\ORM\EntityManager;
use App\Entity\Produto;
use App\Repository\ProdutoRepository;
use App\Service\Produto\Command\EditarProdutoCommand;

final class EditarProdutoHandler
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var ProdutoRepository
     */
    private $repository;

    /**
     * @var FabricanteRepository
     */
    private $fabricanteRepository;

    /**
     * @var UnidadeRepository
     */
    private $unidadeRepository;

    /**
     * @var TipoRepository
     */
    private $tipoRepository;

    /**
     * IncluirCidadeHandler constructor.
     * @param EntityManager $em
     * @param ProdutoRepository $repository
     * @param FabricanteRepository $fabricanteRepository
     * @param UnidadeRepository $unidadeRepository
     * @param TipoRepository $tipoRepository
     */
    public function __construct(
        EntityManager $em,
        ProdutoRepository $repository,
        FabricanteRepository $fabricanteRepository,
        UnidadeRepository $unidadeRepository,
        TipoRepository $tipoRepository
    ){
        $this->em = $em;
        $this->repository = $repository;
        $this->fabricanteRepository = $fabricanteRepository;
        $this->unidadeRepository = $unidadeRepository;
        $this->tipoRepository = $tipoRepository;
    }

    public function handle(EditarProdutoCommand $command)
    {
        $this->em->beginTransaction();
        try {
            /**
             * @var Produto $entity
             */
            $entity = $this->repository->find($command->getId());

            /**
             * @var Fabricante $fabricante
             */
            $fabricante = $this->fabricanteRepository->find($command->getFabricante());

            /**
             * @var Unidade $unidade
             */
            $unidade = $this->unidadeRepository->find($command->getUnidade());

            /**
             * @var Tipo $tipo
             */
            $tipo = $this->tipoRepository->find($command->getTipo());

            $entity
                ->setDescricao($command->getDescricao())
                ->setEstoque($command->getEstoque())
                ->setCusto($command->getCusto())
                ->setVenda($command->getVenda())
                ->setFabricante($fabricante)
                ->setUnidade($unidade)
                ->setTipo($tipo);

            $this->repository->add($entity);
            $this->em->commit();
        } catch (\Exception $e) {
            $this->em->rollback();
            throw $e;
        }
    }
}