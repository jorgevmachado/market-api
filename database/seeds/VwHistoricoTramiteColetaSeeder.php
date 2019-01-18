<?php

use Illuminate\Database\Seeder;

class VwHistoricoTramiteColetaSeeder extends Seeder
{
    /** @var \App\Repository\VwHistoricoTramiteColetaRepository */
    private $vwHistoricoTramiteColetaRepository;

    /** @var \Doctrine\ORM\EntityManager */
    private $em;


    public function __construct(
        \App\Repository\VwHistoricoTramiteColetaRepository $vwHistoricoTramiteColetaRepository,
        \Doctrine\ORM\EntityManager $em
    ){
        $this->vwHistoricoTramiteColetaRepository = $vwHistoricoTramiteColetaRepository;
        $this->em = $em;
    }

    public function run()
    {
        $this->vwHistoricoTramiteColetaRepository->add(
            (new \App\Entity\VwHistoricoTramiteColeta())
            ->setId(1)
            ->setIdHistorico(1)
            ->setDataHistorico(new \DateTime())
            ->setNumeroColeta(1)
            ->setNumeroMatricula('sicam_comum')
            ->setNumeroStatusColeta($this->em->getPartialReference(\App\Entity\StatusColeta::class,1))
            ->setJustificativa('Justificativa')
        );
        $this->em->flush();
    }

}