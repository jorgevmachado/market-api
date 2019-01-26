<?php

use Illuminate\Database\Seeder;

class LogSeeder extends Seeder
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
     * LogSeeder constructor
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
        $entity1 = new \App\Entity\HistoricoOperacao(
            'cidade',
            'D',
            new \DateTime(),
            1,
            'Exclusão de Dados'
        );


        $entity2 = new \App\Entity\HistoricoOperacao(
            'cidade',
            'I',
            new \DateTime(),
            2,
            'Inclusão de Dados'
        );

        $this->repository->add($entity1);
        $this->repository->add($entity2);
    }
}
