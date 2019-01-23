<?php

use Illuminate\Database\Seeder;

class UnidadeSeeder extends Seeder
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;
    /**
     * @var \App\Repository\UnidadeRepository
     */
    private $repository;

    /**
     * UnidadeSeeder constructor
     * @param \Doctrine\ORM\EntityManager $em
     * @param \App\Repository\UnidadeRepository $repository
     */
    public function __construct(
        \Doctrine\ORM\EntityManager $em,
        \App\Repository\UnidadeRepository $repository)
    {
        $this->em = $em;
        $this->repository = $repository;
    }

    public function run()
    {
        $entity1 = new \App\Entity\Unidade('cm', 'Centímetro');
        $entity2 = new \App\Entity\Unidade('m',  'Metro');
        $entity3 = new \App\Entity\Unidade('cm2','Centímetro quadrado');
        $entity4 = new \App\Entity\Unidade('m2', 'Metro quadrado');
        $entity5 = new \App\Entity\Unidade('cm3','Centímetro cúbico');
        $entity6 = new \App\Entity\Unidade('m3', 'Metro cúbico');
        $entity7 = new \App\Entity\Unidade('Kg', 'Kilograma');
        $entity8 = new \App\Entity\Unidade('Gr', 'Grama');
        $entity9 = new \App\Entity\Unidade('L',  'Litro');
        $entity10 = new \App\Entity\Unidade('PC', 'Peça');
        $entity11 = new \App\Entity\Unidade('PCT','Pacote');
        $entity12 = new \App\Entity\Unidade('CX', 'Caixa');
        $entity13 = new \App\Entity\Unidade('SAC','Saco');
        $entity14 = new \App\Entity\Unidade('TON','Tonelada');
        $entity15 = new \App\Entity\Unidade('KIT','Kit');
        $entity16 = new \App\Entity\Unidade('GL', 'Galão');
        $entity17 = new \App\Entity\Unidade('FD', 'Fardo');
        $entity18 = new \App\Entity\Unidade('BL', 'Bloco');
        $this->repository->add($entity1);
        $this->repository->add($entity2);
        $this->repository->add($entity3);
        $this->repository->add($entity4);
        $this->repository->add($entity5);
        $this->repository->add($entity6);
        $this->repository->add($entity7);
        $this->repository->add($entity8);
        $this->repository->add($entity9);
        $this->repository->add($entity10);
        $this->repository->add($entity11);
        $this->repository->add($entity12);
        $this->repository->add($entity13);
        $this->repository->add($entity14);
        $this->repository->add($entity15);
        $this->repository->add($entity16);
        $this->repository->add($entity17);
        $this->repository->add($entity18);
    }
}
