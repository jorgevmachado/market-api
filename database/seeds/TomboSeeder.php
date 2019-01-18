<?php

use Illuminate\Database\Seeder;

class TomboSeeder extends Seeder
{
    /** @var \App\Repository\TomboRepository */
    private $tomboRepository;

    /** @var \Doctrine\ORM\EntityManager */
    private $em;

    public function __construct(
        \App\Repository\TomboRepository $tomboRepository,
        \Doctrine\ORM\EntityManager $em
    ){
        $this->tomboRepository = $tomboRepository;
        $this->em = $em;
    }


    public function run()
    {
        //Termo para a lotação 74
        $termo1 =
            $this->em->getReference(\App\Entity\Termo::class, ['numeroTermo'=>1, 'anoTermo' => 2018, 'tipoTermo' => 5]);
        //Termo para a lotação 2
        $termo2 =
            $this->em->getReference(\App\Entity\Termo::class, ['numeroTermo'=>2, 'anoTermo' => 2018, 'tipoTermo' => 5]);
        $tipoTombo = $this->em->getReference(\App\Entity\TipoTombo::class, 'T');
        $this->tomboRepository->add(new \App\Entity\Tombo(
            '100000',
            $termo1,
            $this->em->getReference(\App\Entity\Material::class, 1600006001),
            $tipoTombo
        ));
        $this->tomboRepository->add(new \App\Entity\Tombo(
            '100001',
            $termo1,
            $this->em->getReference(\App\Entity\Material::class, 1600033001),
            $tipoTombo
        ));
        $this->tomboRepository->add(new \App\Entity\Tombo(
            '100002',
            $termo1,
            $this->em->getReference(\App\Entity\Material::class, 1600033002),
            $tipoTombo
        ));

        $this->tomboRepository->add(new \App\Entity\Tombo(
            '100003',
            $termo2,
            $this->em->getReference(\App\Entity\Material::class, 1600033003),
            $tipoTombo
        ));
    }


}