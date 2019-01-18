<?php

use Illuminate\Database\Seeder;

class MembroInventarioSeeder extends Seeder
{
    /**
     * @var \App\Repository\MembroInventarioRepository
     */
    private $membroInventarioRepository;

    /**
     * @var \App\Repository\MembroAuxiliarLotacaoRepository
     */
    private $membroAuxiliarLotacaoRepository;

    /**
     * @var \App\Repository\ConsolidacaoLotacaoRepository
     */
    private $consolidacaoLotacaoRepository;

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;

    public function __construct(
        \App\Repository\MembroInventarioRepository $membroInventarioRepository,
        \App\Repository\MembroAuxiliarLotacaoRepository $membroAuxiliarLotacaoRepository,
        \App\Repository\ConsolidacaoLotacaoRepository $consolidacaoLotacaoRepository,
        \Doctrine\ORM\EntityManager $em
    ) {
        $this->membroInventarioRepository = $membroInventarioRepository;
        $this->membroAuxiliarLotacaoRepository = $membroAuxiliarLotacaoRepository;
        $this->consolidacaoLotacaoRepository = $consolidacaoLotacaoRepository;

        $this->em = $em;
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function run()
    {
        $inventario1 = $this->em->getReference(\App\Entity\Inventario::class, 1);
        $inventario2 = $this->em->getReference(\App\Entity\Inventario::class, 2);

        //-----------------------------------------------AUXILIAR------------------------------------------------------
        $ma1 = new \App\Entity\MembroInventario(
            $inventario1,
            $this->em->getReference(\App\Entity\TipoMembro::class, \App\Entity\TipoMembro::AUXILIAR),
            'TR1000MA1',
            null,
            new \DateTime(),
            'SICAM_COMUM'
        );

        $ma2 = new \App\Entity\MembroInventario(
            $inventario2,
            $this->em->getReference(\App\Entity\TipoMembro::class, \App\Entity\TipoMembro::AUXILIAR),
            'TR1000MA1',
            null,
            new \DateTime(),
            'sicam_comum'
        );

        $ma3 = new \App\Entity\MembroInventario(
            $inventario1,
            $this->em->getReference(\App\Entity\TipoMembro::class, \App\Entity\TipoMembro::AUXILIAR),
            'TR1000MA2',
            null,
            new \DateTime(),
            'SICAM_COMUM'
        );

        $this->membroInventarioRepository->add($ma1);
        $this->membroInventarioRepository->add($ma2);
        $this->membroInventarioRepository->add($ma3);

        //----------------------------------------------LOTAÇÕES DOS AUXILIARES----------------------------------------
        $mal1 = new \App\Entity\MembroAuxiliarLotacao(
            $this->em->getReference(\App\Entity\Lotacao::class, 2),
            $ma1,
            'TR1000MA1'
        );

        $this->membroAuxiliarLotacaoRepository->add($mal1);
        $this->membroAuxiliarLotacaoRepository->add(
            new \App\Entity\MembroAuxiliarLotacao(
                $this->em->getReference(\App\Entity\Lotacao::class, 7),
                $ma1,
                'TR1000MA2'
            )
        );
        $this->membroAuxiliarLotacaoRepository->add(
            new \App\Entity\MembroAuxiliarLotacao(
                $this->em->getReference(\App\Entity\Lotacao::class, 2),
                $ma2,
                'TR10001'
            )
        );
        $this->membroAuxiliarLotacaoRepository->add(
            new \App\Entity\MembroAuxiliarLotacao(
                $this->em->getReference(\App\Entity\Lotacao::class, 74),
                $ma3,
                'TR1000MA3'
            )
        );

        //-------------------------------------------------COMISSAO----------------------------------------------------
        $this->membroInventarioRepository->add(
            new \App\Entity\MembroInventario(
                $inventario1,
                $this->em->getReference(\App\Entity\TipoMembro::class, 3),
                'TR2000',
                'M',
                new \DateTime(),
                'SICAM_COMUM'
            )
        );
        $this->membroInventarioRepository->add(
            new \App\Entity\MembroInventario(
                $inventario1,
                $this->em->getReference(\App\Entity\TipoMembro::class, 3),
                'TR3000',
                'P',
                new \DateTime(),
                'SICAM_COMUM'
            )
        );
        $this->membroInventarioRepository->add(
            new \App\Entity\MembroInventario(
                $inventario1,
                $this->em->getReference(\App\Entity\TipoMembro::class, 3),
                'SICAM_COMISSAO',
                'M',
                new \DateTime(),
                'SICAM_ADMIN'
            )
        );

        $this->membroInventarioRepository->add(
            new \App\Entity\MembroInventario(
                $inventario2,
                $this->em->getReference(\App\Entity\TipoMembro::class, 3),
                'TR2000',
                'M',
                new \DateTime(),
                'SICAM_COMUM'
            )
        );
        $this->membroInventarioRepository->add(
            new \App\Entity\MembroInventario(
                $inventario2,
                $this->em->getReference(\App\Entity\TipoMembro::class, 3),
                'TR3000',
                'P',
                new \DateTime(),
                'SICAM_COMUM'
            )
        );
        $this->membroInventarioRepository->add(
            new \App\Entity\MembroInventario(
                $inventario2,
                $this->em->getReference(\App\Entity\TipoMembro::class, 3),
                'SICAM_COMISSAO',
                'M',
                new \DateTime(),
                'SICAM_ADMIN'
            )
        );

//        $dataConsolidacao = new \DateTime();
//        $statusConsolidacao = $this->em->getReference(\App\Entity\StatusConsolidacao::class, 1);
//        $termoCiencia = $this->em->getReference(\App\Entity\TermoCiencia::class, 1);
//        $conLotacao = new \App\Entity\ConsolidacaoLotacao(
//            $dataConsolidacao,
//            $mal1,
//            $statusConsolidacao,
//            $termoCiencia
//        );
//
//        // CONSOLIDAÇÃO DA LOTAÇÃO
//        $this->consolidacaoLotacaoRepository->add($conLotacao);

        $this->em->flush();
    }
}