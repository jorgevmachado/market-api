<?php

use Illuminate\Database\Seeder;

class TipoMembroSeeder extends Seeder
{
    /** @var \App\Repository\TipoMembroRepository */
    private $tipoMembroRepository;

    /** @var \Doctrine\ORM\EntityManager */
    private $em;

    public function __construct(
        \App\Repository\TipoMembroRepository $tipoMembroRepository,
        \Doctrine\ORM\EntityManager $em
    ){
        $this->tipoMembroRepository = $tipoMembroRepository;
        $this->em = $em;
    }
    /**
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function run()
    {
        $tipoMembro1 = new \App\Entity\TipoMembro(1,'Membro Auxiliar');
        $tipoMembro2 = new \App\Entity\TipoMembro(2,'Agente Consignatário');
        $tipoMembro3 = new \App\Entity\TipoMembro(3,'Membro da Comissão');

        $this->tipoMembroRepository->add($tipoMembro1);
        $this->tipoMembroRepository->add($tipoMembro2);
        $this->tipoMembroRepository->add($tipoMembro3);
        $this->em->flush();
    }

}