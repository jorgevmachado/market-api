<?php

use Illuminate\Database\Seeder;

class HistoricoOperacaoSeeder extends Seeder
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;
    /**
     * @var \App\Repository\HistoricoOperacaoRepository
     */
    private $repository;

    /**
     * HistoricoOperacaoSeeder constructor
     * @param \Doctrine\ORM\EntityManager $em
     * @param \App\Repository\HistoricoOperacaoRepository $repository
     */
    public function __construct(
        \Doctrine\ORM\EntityManager $em,
        \App\Repository\HistoricoOperacaoRepository $repository)
    {
        $this->em = $em;
        $this->repository = $repository;
    }

    public function run()
    {
        $delete = \App\Entity\HistoricoOperacao::TIPO_OP_DELETE;
        $update = \App\Entity\HistoricoOperacao::TIPO_OP_UPDATE;
        $cidadeId = 1;
        $fabricanteId = 1;

        $entity1 = new \App\Entity\HistoricoOperacao(
            $delete,
            new \DateTime(),
            'cidade',
            $cidadeId,
            'Cidade excluida.'
        );

        $entity2 = new \App\Entity\HistoricoOperacao(
            $update,
            new \DateTime(),
            'fabricante',
            $fabricanteId,
            'Nome do fabricante alterado.',
            'no_fabricante',
            'Magia luxos'

        );
        $this->repository->add($entity1);
        $this->repository->add($entity2);
    }
}
