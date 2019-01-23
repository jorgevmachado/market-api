<?php

use Illuminate\Database\Seeder;

class FabricanteSeeder extends Seeder
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;
    /**
     * @var \App\Repository\FabricanteRepository
     */
    private $repository;

    /**
     * FabricanteSeeder constructor
     * @param \Doctrine\ORM\EntityManager $em
     * @param \App\Repository\FabricanteRepository $repository
     */
    public function __construct(
        \Doctrine\ORM\EntityManager $em,
        \App\Repository\FabricanteRepository $repository)
    {
        $this->em = $em;
        $this->repository = $repository;
    }

    public function run()
    {
        $entity1 = new \App\Entity\Fabricante('Kingston' ,   'www.kingston.com');
        $entity2 = new \App\Entity\Fabricante('Seagate' ,    'www.seagate.com');
        $entity3 = new \App\Entity\Fabricante('Corsair' ,    'www.corsair.com');
        $entity4 = new \App\Entity\Fabricante('Olimpus' ,    'www.olimpus.com');
        $entity5 = new \App\Entity\Fabricante('Samsung' ,    'www.samsung.com');
        $entity6 = new \App\Entity\Fabricante('Sony' ,       'www.sony.com');
        $entity7 = new \App\Entity\Fabricante('Creative' ,   'www.creative.com');
        $entity8 = new \App\Entity\Fabricante('Intel' ,      'www.intel.com');
        $entity9 = new \App\Entity\Fabricante('HP' ,         'www.hp.com');
        $entity10 = new \App\Entity\Fabricante('Satellite' , 'www.satellite.com');

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
    }
}
