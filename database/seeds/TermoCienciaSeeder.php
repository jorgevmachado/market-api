<?php

use Illuminate\Database\Seeder;

class TermoCienciaSeeder extends Seeder
{
    /** @var \App\Repository\TermoCienciaRepository */
    private $termoCienciaRepository;

    /** @var \Doctrine\ORM\EntityManager */
    private $em;

    public function __construct(
        \App\Repository\TermoCienciaRepository $termoCienciaRepository,
        \Doctrine\ORM\EntityManager $em
    ){
        $this->termoCienciaRepository = $termoCienciaRepository;
        $this->em = $em;
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function run()
    {
        $this->termoCienciaRepository->add(new \App\Entity\TermoCiencia('Descrição do termo', 1));
        $this->em->flush();
    }
}
