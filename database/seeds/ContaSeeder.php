<?php

use Illuminate\Database\Seeder;

class ContaSeeder extends Seeder
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;
    /**
     * @var \App\Repository\ContaRepository
     */
    private $repository;

    /**
     * ContaSeeder constructor
     * @param \Doctrine\ORM\EntityManager $em
     * @param \App\Repository\ContaRepository $repository
     */
    public function __construct(
        \Doctrine\ORM\EntityManager $em,
        \App\Repository\ContaRepository $repository)
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
        $cliente1 =  $this->em->getReference(\App\Entity\Pessoa::class,1);
            /** @var \App\Entity\Pessoa $cliente2 */
        $cliente2 =  $this->em->getReference(\App\Entity\Pessoa::class,2);


        $entity1 = new \App\Entity\Conta(
            new \DateTime('2019-01-02'),
            new \DateTime('2019-02-02'),
            195.0,
            'N',
            $cliente1
        );
        $entity2 = new \App\Entity\Conta(
            new \DateTime('2019-01-01'),
            new \DateTime('2019-02-01'),
            195.0,
            'N',
            $cliente1
        );
        $entity3 = new \App\Entity\Conta(
            new \DateTime('2019-01-03'),
            new \DateTime('2019-02-03'),
            132.5,
            'S',
            $cliente2
        );
        $entity4 = new \App\Entity\Conta(
            new \DateTime('2019-01-04'),
            new \DateTime('2019-02-04'),
            132.5,
            'N',
            $cliente2
        );
        $this->repository->add($entity1);
        $this->repository->add($entity2);
        $this->repository->add($entity3);
        $this->repository->add($entity4);
    }
}
