<?php

use Illuminate\Database\Seeder;

class TipoTomboSeeder extends Seeder
{
    /** @var \App\Repository\TipoTomboRepository */
    private $tipoTomboRepository;

    /** @var \Doctrine\ORM\EntityManager */
    private $em;

    public function __construct(
        \App\Repository\TipoTomboRepository $tipoTomboRepository,
        \Doctrine\ORM\EntityManager $em
    ){
        $this->tipoTomboRepository = $tipoTomboRepository;
        $this->em = $em;
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function run()
    {
        $this->tipoTomboRepository->add(new \App\Entity\TipoTombo('T','TOMBO'));
        $this->tipoTomboRepository->add(new \App\Entity\TipoTombo('I','INCORPORAÇÃO'));
        $this->tipoTomboRepository->add(new \App\Entity\TipoTombo('L','LIVRO'));
        $this->tipoTomboRepository->add(new \App\Entity\TipoTombo('X','OUTROS'));
        $this->tipoTomboRepository->add(new \App\Entity\TipoTombo('D','DURADOURO'));

        $this->em->flush();
    }
}
