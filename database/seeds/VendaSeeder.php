<?php

use Illuminate\Database\Seeder;

class VendaSeeder extends Seeder
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;
    /**
     * @var \App\Repository\VendaRepository
     */
    private $repository;

    /**
     * VendaSeeder constructor
     * @param \Doctrine\ORM\EntityManager $em
     * @param \App\Repository\VendaRepository $repository
     */
    public function __construct(
        \Doctrine\ORM\EntityManager $em,
        \App\Repository\VendaRepository $repository)
    {
        $this->em = $em;
        $this->repository = $repository;
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     */
    public function run()
    {
        /** @var \App\Entity\Pessoa $cliente1 */
        $cliente1 = $this->em->getReference(\App\Entity\Pessoa::class,1);
        /** @var \App\Entity\Pessoa $cliente2 */
        $cliente2 = $this->em->getReference(\App\Entity\Pessoa::class,2);
        $dataVenda1 = new \DateTime('2018-01-01');
        $dataVenda2 = new \DateTime('2018-02-02');
        $entity1 = new \App\Entity\Venda(
            $dataVenda1,
            400.0,
            390.0,
            'obs1',
            $cliente1,
            50.0,
            40.0
        );
        $entity2 = new \App\Entity\Venda(
            $dataVenda2,
            265.0,
            265.0,
            'obs2',
            $cliente2,
            NULL,
            NULL
        );
        $this->repository->add($entity1);
        $this->repository->add($entity2);
    }
}
