<?php

use Illuminate\Database\Seeder;

class GrupoSeeder extends Seeder
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;
    /**
     * @var \App\Repository\GrupoRepository
     */
    private $repository;

    /**
     * GrupoSeeder constructor
     * @param \Doctrine\ORM\EntityManager $em
     * @param \App\Repository\GrupoRepository $repository
     */
    public function __construct(
        \Doctrine\ORM\EntityManager $em,
        \App\Repository\GrupoRepository $repository)
    {
        $this->em = $em;
        $this->repository = $repository;
    }

    public function run()
    {
        $entity1 = new \App\Entity\Grupo('Cliente');
        $entity2 = new \App\Entity\Grupo('Fornecedor');
        $entity3 = new \App\Entity\Grupo('Revendedor');
        $entity4 = new \App\Entity\Grupo('Colaborador');
        $this->repository->add($entity1);
        $this->repository->add($entity2);
        $this->repository->add($entity3);
        $this->repository->add($entity4);
    }
}
