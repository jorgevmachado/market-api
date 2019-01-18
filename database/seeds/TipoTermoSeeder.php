<?php

use Illuminate\Database\Seeder;

class TipoTermoSeeder extends Seeder
{
    /** @var \App\Repository\TipoTermoRepository */
    private $tipoTermoRepository;

    /** @var \Doctrine\ORM\EntityManager */
    private $em;

    public function __construct(
        \App\Repository\TipoTermoRepository $tipoTermoRepository,
        \Doctrine\ORM\EntityManager $em
    ) {
        $this->tipoTermoRepository = $tipoTermoRepository;
        $this->em = $em;
    }

    public function run()
    {
        $this->tipoTermoRepository->add(new \App\Entity\TipoTermo(1, 'TRANSFERÊNCIA'));
        $this->tipoTermoRepository->add(new \App\Entity\TipoTermo(2, 'CESSÃO'));
        $this->tipoTermoRepository->add(new \App\Entity\TipoTermo(3, 'DOAÇÃO'));
        $this->tipoTermoRepository->add(new \App\Entity\TipoTermo(4, 'BAIXA'));
        $this->tipoTermoRepository->add(new \App\Entity\TipoTermo(5, 'RESPONSABILIDADE'));
        $this->tipoTermoRepository->add(new \App\Entity\TipoTermo(6, 'TERCEIROS'));
    }
}