<?php

use Illuminate\Database\Seeder;

class InventarioSeeder extends Seeder
{
    /** @var \App\Repository\InventarioRepository */
    private $inventarioRepository;

    /** @var \Doctrine\ORM\EntityManager */
    private $em;

    public function __construct(
        \App\Repository\InventarioRepository $inventarioRepository,
        \Doctrine\ORM\EntityManager $em
    ){
        $this->inventarioRepository = $inventarioRepository;
        $this->em = $em;
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function run()
    {
        $lotacao = $this->em->getReference(\App\Entity\Lotacao::class,2);
        $inventarioAnual = new \App\Entity\Inventario(
            'A',
            2018,
            '123456789',
            '1'
        );

        $inventarioExtraordinario = new \App\Entity\Inventario(
            'E',
            2018,
            '123',
            '1',
            $lotacao
        );

        $this->inventarioRepository->add($inventarioAnual);
        $this->inventarioRepository->add($inventarioExtraordinario);
        $this->em->flush();

    }


}