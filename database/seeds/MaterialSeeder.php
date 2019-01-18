<?php

use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /** @var \App\Repository\MaterialRepository */
    private $taterialRepository;

    /** @var \Doctrine\ORM\EntityManager */
    private $em;

    public function __construct(
        \App\Repository\MaterialRepository $taterialRepository,
        \Doctrine\ORM\EntityManager $em
    ) {
        $this->taterialRepository = $taterialRepository;
        $this->em = $em;
    }

    public function run()
    {
        $this->taterialRepository->add(new \App\Entity\Material(
            1600006001,
            'MODEM MÓVEL D-LINK MODELO DWM - 221 4G MAX DA OPERADORA CLARO. REGIME DE COMODATO'
        ));
        $this->taterialRepository->add(new \App\Entity\Material(
            1600033001, 'TELA PARA PROJEÇÃO MARCA PLASTILUX'
        ));
        $this->taterialRepository->add(new \App\Entity\Material(
            1600033002, 'CONVERSOR DE MÍDIA - IEEE1394, BIDIRECIONAL, OPERA COM OU SEM COMPUTADOR'
        ));
        $this->taterialRepository->add(new \App\Entity\Material(
            1600033003, 'ILHA DE EDIÇÃO - NÃO LINEAR, EDIÇÃO EM HD E SD SEM COMPRESSÃO'
        ));
        $this->taterialRepository->add(new \App\Entity\Material(
            1600033004, 'GRAVADOR PADRÃO DVCAM - PARA EDIÇÃO, PARA CASSETES NO FORMATO DV, MINI DV E DVCAM'
        ));
        $this->taterialRepository->add(new \App\Entity\Material(
            1600033005, 'GRAVADOR PADRÃO HDV/DVCAM/DV - VISOR LCD 3,5" EM CORES, MOD. HVR-M15N, MARCA SONY'
        ));
        $this->taterialRepository->add(new \App\Entity\Material(
            1600033006, 'GRAVADOR DE STÚDIO - PADRÃO DVCAM, SISTEMA NTSC/PAL, GRAVA CASSETES NO FORMADO'
        ));
    }
}