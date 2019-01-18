<?php

use Illuminate\Database\Seeder;

class TipoPeriodoSeeder extends Seeder
{
    /** @var \App\Repository\TipoPeriodoRepository */
    private $tipoPeriodoRepository;

    /** @var \Doctrine\ORM\EntityManager */
    private $em;

    public function __construct(
        \App\Repository\TipoPeriodoRepository $tipoPeridoRepository,
        \Doctrine\ORM\EntityManager $em
    ){
        $this->tipoPeriodoRepository = $tipoPeridoRepository;
        $this->em = $em;
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function run()
    {
        $this->tipoPeriodoRepository->add(new \App\Entity\TipoPeriodo('Abrangência Geral','G'));
        $this->tipoPeriodoRepository->add(new \App\Entity\TipoPeriodo('Coleta','C'));
        $this->tipoPeriodoRepository->add(new \App\Entity\TipoPeriodo('Consolidação de Lotação','L'));
        $this->tipoPeriodoRepository->add(new \App\Entity\TipoPeriodo('Consolidação do TRF','T'));

        $this->em->flush();
    }
}
