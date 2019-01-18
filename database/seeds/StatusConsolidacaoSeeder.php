<?php

use Illuminate\Database\Seeder;

class StatusConsolidacaoSeeder extends Seeder
{
    /**
     * @var \App\Repository\StatusConsolidacaoRepository
     */
    private $statusConsolidacaoRepository;

    /** @var \Doctrine\ORM\EntityManager */
    private $em;

    public function __construct(
        \App\Repository\StatusConsolidacaoRepository $statusConsolidacaoRepository,
        \Doctrine\ORM\EntityManager $em
    ) {
        $this->statusConsolidacaoRepository = $statusConsolidacaoRepository;
        $this->em = $em;
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function run()
    {
        $this->statusConsolidacaoRepository->add(new \App\Entity\StatusConsolidacao(1, 'Pendente Parecer MC', 'L'));
        $this->statusConsolidacaoRepository->add(new \App\Entity\StatusConsolidacao(2, 'Parecer Favorável', 'L'));
        $this->statusConsolidacaoRepository->add(new \App\Entity\StatusConsolidacao(3, 'Parecer não Favorável', 'L'));
        $this->em->flush();
    }
}