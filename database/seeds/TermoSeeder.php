<?php

use Illuminate\Database\Seeder;

class TermoSeeder extends Seeder
{
    /** @var \App\Repository\TermoRepository */
    private $termoRepository;

    /** @var \Doctrine\ORM\EntityManager */
    private $em;

    public function __construct(
        \App\Repository\TermoRepository $termoRepository,
        \Doctrine\ORM\EntityManager $em
    ) {
        $this->termoRepository = $termoRepository;
        $this->em = $em;
    }

    public function run()
    {
        $this->termoRepository->add(new \App\Entity\Termo(
            1,
            2018,
            $this->em->getReference(\App\Entity\Lotacao::class, 74),
            1,
            $this->em->getReference(\App\Entity\TipoTermo::class, 5)
        ));
        $this->termoRepository->add(new \App\Entity\Termo(
            2,
            2018,
            $this->em->getReference(\App\Entity\Lotacao::class, 2),
            1,
            $this->em->getReference(\App\Entity\TipoTermo::class, 5)
        ));
    }
}