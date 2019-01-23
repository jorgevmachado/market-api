<?php

use Illuminate\Database\Seeder;

class TipoSeeder extends Seeder
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;
    /**
     * @var \App\Repository\TipoRepository
     */
    private $repository;

    /**
     * TipoSeeder constructor
     * @param \Doctrine\ORM\EntityManager $em
     * @param \App\Repository\TipoRepository $repository
     */
    public function __construct(
        \Doctrine\ORM\EntityManager $em,
        \App\Repository\TipoRepository $repository)
    {
        $this->em = $em;
        $this->repository = $repository;
    }

    public function run()
    {
        $entity1 = new \App\Entity\Tipo('Máquina');
        $entity2 = new \App\Entity\Tipo('Acessório');
        $entity3 = new \App\Entity\Tipo('Insumo');
        $entity4 = new \App\Entity\Tipo('Componente');
        $entity5 = new \App\Entity\Tipo('Suprimento');
        $this->repository->add($entity1);
        $this->repository->add($entity2);
        $this->repository->add($entity3);
        $this->repository->add($entity4);
        $this->repository->add($entity5);
    }
}
