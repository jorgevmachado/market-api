<?php

use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;
    /**
     * @var \App\Repository\EstadoRepository
     */
    private $repository;

    /**
     * EstadoSeeder constructor
     * @param \Doctrine\ORM\EntityManager $em
     * @param \App\Repository\EstadoRepository $repository
     */
    public function __construct(
        \Doctrine\ORM\EntityManager $em,
        \App\Repository\EstadoRepository $repository)
    {
        $this->em = $em;
        $this->repository = $repository;
    }

    public function run()
    {
        $entity1 = new \App\Entity\Estado('AC','Acre');
        $entity2 = new \App\Entity\Estado('AL','Alagoas');
        $entity3 = new \App\Entity\Estado('AP','Amapá');
        $entity4 = new \App\Entity\Estado('AM','Amazonas');
        $entity5 = new \App\Entity\Estado('BA','Bahia');
        $entity6 = new \App\Entity\Estado('CE','Ceará');
        $entity7 = new \App\Entity\Estado('DF','Distrito Federal');
        $entity8 = new \App\Entity\Estado('ES','Espírito Santo');
        $entity9 = new \App\Entity\Estado('GO','Goiás');
        $entity10 = new \App\Entity\Estado('MA','Maranhão');
        $entity11 = new \App\Entity\Estado('MT','Mato Grosso');
        $entity12 = new \App\Entity\Estado('MS','Mato Grosso do Sul');
        $entity13 = new \App\Entity\Estado('MG','Minas Gerais');
        $entity14 = new \App\Entity\Estado('PA','Pará');
        $entity15 = new \App\Entity\Estado('PB','Paraíba');
        $entity16 = new \App\Entity\Estado('PR','Paraná');
        $entity17 = new \App\Entity\Estado('PE','Pernambuco');
        $entity18 = new \App\Entity\Estado('PI','Piauí');
        $entity19 = new \App\Entity\Estado('RJ','Rio de Janeiro');
        $entity20 = new \App\Entity\Estado('RN','Rio Grande do Norte');
        $entity21 = new \App\Entity\Estado('RS','Rio Grande do Sul');
        $entity22 = new \App\Entity\Estado('RO','Rondônia');
        $entity23 = new \App\Entity\Estado('RR','Roraima');
        $entity24 = new \App\Entity\Estado('SC','Santa Catarina');
        $entity25 = new \App\Entity\Estado('SP','São Paulo');
        $entity26 = new \App\Entity\Estado('SE','Sergipe');
        $entity27 = new \App\Entity\Estado('TO','Tocantins');
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
        $this->repository->add($entity19);
        $this->repository->add($entity20);
        $this->repository->add($entity21);
        $this->repository->add($entity22);
        $this->repository->add($entity23);
        $this->repository->add($entity24);
        $this->repository->add($entity25);
        $this->repository->add($entity26);
        $this->repository->add($entity27);
    }
}
