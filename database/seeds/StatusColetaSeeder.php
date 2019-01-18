<?php

use Illuminate\Database\Seeder;

class StatusColetaSeeder extends Seeder
{
    /** @var \App\Repository\StatusColetaRepository */
    private $statusColetaRepository;

    /** @var \Doctrine\ORM\EntityManager */
    private $em;

    public function __construct(
        \App\Repository\StatusColetaRepository $statusColetaRepository,
        \Doctrine\ORM\EntityManager $em
    ){
        $this->statusColetaRepository = $statusColetaRepository;
        $this->em = $em;
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function run()
    {
        $pe = new \App\Entity\StatusColeta(1,'Pendente de Envio MA');
        $ev = new \App\Entity\StatusColeta(2,'Enviada MA');
        $ap = new \App\Entity\StatusColeta(3,'Pendente de reenvio MA');
        $ex = new \App\Entity\StatusColeta(4,'Excluída');
        $co = new \App\Entity\StatusColeta(5,'Consolidada');
        $ic = new \App\Entity\StatusColeta(6,'Invalidada para Consolidação');

        $this->statusColetaRepository->add($pe);
        $this->statusColetaRepository->add($ev);
        $this->statusColetaRepository->add($ap);
        $this->statusColetaRepository->add($ex);
        $this->statusColetaRepository->add($co);
        $this->statusColetaRepository->add($ic);
        $this->em->flush();
    }
}