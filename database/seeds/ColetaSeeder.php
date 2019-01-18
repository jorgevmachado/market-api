<?php

use Illuminate\Database\Seeder;

class ColetaSeeder extends Seeder
{
    /**
     * @var \App\Repository\ColetaRepository
     */
    private $coletaRepository;

    /**
     * @var \App\Repository\HistoricoColetaStatusRepository
     */
    private $historicoColetaStatusRepository;

    /**
     * @var \App\Repository\HistoricoEnvioColetaRepository
     */
    private $historicoEnvioColetaRepository;

    /**
     * @var \App\Repository\MaterialColetaRepository
     */
    private $materialColetaRepository;

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;

    /**
     * ColetaSeeder constructor.
     * @param \App\Repository\ColetaRepository $coletaRepository
     * @param \App\Repository\HistoricoColetaStatusRepository $historicoColetaStatusRepository
     * @param \App\Repository\HistoricoEnvioColetaRepository $historicoEnvioColetaRepository
     * @param \App\Repository\MaterialColetaRepository $materialColetaRepository
     * @param \Doctrine\ORM\EntityManager $em
     */
    public function __construct(
        \App\Repository\ColetaRepository $coletaRepository,
        \App\Repository\HistoricoColetaStatusRepository $historicoColetaStatusRepository,
        \App\Repository\HistoricoEnvioColetaRepository $historicoEnvioColetaRepository,
        \App\Repository\MaterialColetaRepository $materialColetaRepository,
        \Doctrine\ORM\EntityManager $em
    ) {
        $this->coletaRepository = $coletaRepository;
        $this->historicoColetaStatusRepository = $historicoColetaStatusRepository;
        $this->historicoEnvioColetaRepository = $historicoEnvioColetaRepository;
        $this->materialColetaRepository = $materialColetaRepository;
        $this->em = $em;
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function run()
    {
        $orgao = $this->em->getReference(\App\Entity\SecSubsec::class, 3820);
        $inventario = $this->em->getReference(\App\Entity\Inventario::class, 1);
        $statusColetaPendendeEnvio = $this->em->getReference(\App\Entity\StatusColeta::class, 1);
        $statusColetaEnviadoMA = $this->em->getReference(\App\Entity\StatusColeta::class, 2);
        $statusColetaInvalidadaConsolidacao = $this->em->getReference(
            \App\Entity\StatusColeta::class,
            \App\Entity\StatusColeta::INVALIDADA_PARA_CONSOLIDACAO
        );

        $lotacao = $this->em->getReference(\App\Entity\Lotacao::class, 7);

        $coleta1 = new \App\Entity\Coleta(
            'sicam_comum',
            $orgao,
            new \DateTime('2018/01/01'),
            $lotacao,
            $statusColetaPendendeEnvio,
            $inventario
        );

        $coleta2 = new \App\Entity\Coleta(
            'sicam_comum',
            $orgao,
            new \DateTime('2018/01/02'),
            $this->em->getReference(\App\Entity\Lotacao::class, 74),
            $statusColetaPendendeEnvio,
            $inventario
        );

        $coleta3 = new \App\Entity\Coleta(
            'sicam_comum',
            $orgao,
            new \DateTime('2018/01/02'),
            $this->em->getReference(\App\Entity\Lotacao::class, 74),
            $statusColetaPendendeEnvio,
            $inventario
        );

        $coleta4 = new \App\Entity\Coleta(
            'sicam_comum',
            $orgao,
            new \DateTime('2018/01/02'),
            $this->em->getReference(\App\Entity\Lotacao::class, 74),
            $statusColetaPendendeEnvio,
            $inventario
        );

        $coleta5 = new \App\Entity\Coleta(
            'sicam_comum',
            $orgao,
            new \DateTime('2018/01/02'),
            $this->em->getReference(\App\Entity\Lotacao::class, 74),
            $statusColetaPendendeEnvio,
            $inventario
        );

        $coleta6 = new \App\Entity\Coleta(
            'sicam_comum',
            $orgao,
            new \DateTime('2018/01/02'),
            $this->em->getReference(\App\Entity\Lotacao::class, 8),
            $statusColetaPendendeEnvio,
            $inventario
        );

        $this->coletaRepository->add($coleta1);
        $this->coletaRepository->add($coleta2);
        $this->coletaRepository->add($coleta3);
        $this->coletaRepository->add($coleta4);
        $this->coletaRepository->add($coleta5);
        $this->coletaRepository->add($coleta6);


        //atualiza o status para enviada MA
        $coleta3->setStatus($statusColetaEnviadoMA, 'sicam_comum');
        $coleta5->setStatus($statusColetaEnviadoMA, 'sicam_comum');
        $this->coletaRepository->add($coleta3);
        $this->coletaRepository->add($coleta5);


        //--------------- Inclui registros no Historico de Envio da Coleta para o MA ---------------//

        $this->incluirMaterialColeta5(
            $coleta5,
            $statusColetaEnviadoMA,
            $statusColetaInvalidadaConsolidacao
        );
        //END------------ Inclui registros no Historico de Envio da Coleta para o MA ---------------//

        //atualiza o status para pendente de reenvio MA
        $coleta4->setStatus(
            $this->em->getReference(\App\Entity\StatusColeta::class, 3),
            'sicam_comum'
        );
        $this->coletaRepository->add($coleta4);


        //COLETA EVENTUAL

        $coletaEventual = new \App\Entity\Coleta(
            'sicam_comum',
            $orgao,
            new \DateTime('2016/01/01'),
            $lotacao,
            $statusColetaPendendeEnvio
        );

        $this->coletaRepository->add($coletaEventual);

        $this->em->flush();
    }

    private function incluirMaterialColeta5(
        $coleta5,
        $statusColetaEnviadoMA,
        $statusColetaInvalidadaConsolidacao
    ) {

        // NÃO ENCONTRADO
        $materialDaColeta5_0 = new \App\Entity\MaterialColeta(
            $this->em->getReference(\App\Entity\TipoTombo::class,'T'),
            'Tombo de uma coleta não encontrada.',
            'Tudo certo com o tombo não encontrada.',
            $coleta5,
            $this->em->getReference(\App\Entity\Lotacao::class, 2),
            '0',
            new \DateTime('2018/01/01'),
            new \DateTime('2018/02/02'),
            'sicam_leitor',
            15244,
            'D',
            123456789,
            '1',
            '0',
            '3lkj234klj546lkjsad89712d5e'
        );

        // ENCONTRADO
        $materialDaColeta5_1 = new \App\Entity\MaterialColeta(
            $this->em->getReference(\App\Entity\TipoTombo::class,'T'),
            'Tombo de uma coleta encontrada.',
            'Tudo certo com o tombo encontrada.',
            $coleta5,
            $this->em->getReference(\App\Entity\Lotacao::class, 2),
            '1',
            new \DateTime('2018/01/01'),
            new \DateTime('2018/02/02'),
            'sicam_leitor',
            15244,
            'D',
            123456789,
            '1',
            '0',
            '3lkj234klj546lkjsad89712d5e'
        );

        // OUTRA_LOTACAO
        $materialDaColeta5_2 = new \App\Entity\MaterialColeta(
            $this->em->getReference(\App\Entity\TipoTombo::class,'T'),
            'Tombo de uma coleta encontrada em outra lotação.',
            'Tudo certo com o tombo encontrada em outra lotação.',
            $coleta5,
            $this->em->getReference(\App\Entity\Lotacao::class, 2),
            '2',
            new \DateTime('2018/01/01'),
            new \DateTime('2018/02/02'),
            'sicam_leitor',
            15244,
            'D',
            123456789,
            '1',
            '0',
            '3lkj234klj546lkjsad89712d5e'
        );

        // SEM ETIQUETA
        $materialDaColeta5_3 = new \App\Entity\MaterialColeta(
            $this->em->getReference(\App\Entity\TipoTombo::class,'T'),
            'Tombo de uma coleta.',
            'Tudo certo com o tombo.',
            $coleta5,
            $this->em->getReference(\App\Entity\Lotacao::class, 2),
            '1',
            new \DateTime('2018/01/01'),
            new \DateTime('2018/02/02'),
            'sicam_leitor',
            NULL,
            'D',
            1234567890,
            '1',
            '0',
            '3lkj234klj546lkjsad89712d5e12ad'
        );


        $this->materialColetaRepository->add($materialDaColeta5_0);
        $this->materialColetaRepository->add($materialDaColeta5_1);
        $this->materialColetaRepository->add($materialDaColeta5_2);
        $this->materialColetaRepository->add($materialDaColeta5_3);

        // PRIMEIRO ENVIO PARA O MEMBRO AUXILIAR
            $dtEnvio1MA = new \DateTime('2018/01/15');
        $eHistoricoEnvio1ColetaColeta5 = new \App\Entity\HistoricoEnvioColeta(
            $coleta5,
            $dtEnvio1MA,
            $statusColetaEnviadoMA,
            'sicam_comum'
        );
        $eHistoricoEnvio1ColetaColeta5->addHistoricoStatus(
            $statusColetaEnviadoMA,
            'sicam_comum',
            'Enviado para consolidação',
            $dtEnvio1MA
        );

        $materiaisDaColeta = [$materialDaColeta5_0, $materialDaColeta5_1, $materialDaColeta5_2, $materialDaColeta5_3];
        $statusMaterial = $this->em->getReference(\App\Entity\StatusMaterialColetaEnvio::class,1);

        foreach ($materiaisDaColeta as $materialDaColeta){
           $eHistoricoEnvio1ColetaColeta5->addMaterialEnviado($materialDaColeta,$statusMaterial,'sicam_comum');
        }
        $this->historicoEnvioColetaRepository->add($eHistoricoEnvio1ColetaColeta5);

        // SEGUNDO ENVIO PARA O MEMBRO AUXILIAR
        $dtEnvio2MA = new \DateTime('2018/01/16');
        $eHistoricoEnvio2ColetaColeta5 = new \App\Entity\HistoricoEnvioColeta(
            $coleta5,
            $dtEnvio2MA,
            $statusColetaEnviadoMA,
            'sicam_comum'
        );
        $eHistoricoEnvio2ColetaColeta5->addHistoricoStatus(
            $statusColetaEnviadoMA,
            'sicam_comum',
            'Enviado para consolidação',
            $dtEnvio2MA
        );
        $eHistoricoEnvio2ColetaColeta5->addMaterialEnviado(
            $materialDaColeta5_0,
            $this->em->getReference(\App\Entity\StatusMaterialColetaEnvio::class,1),
            'sicam_comum'
        );
        $this->historicoEnvioColetaRepository->add($eHistoricoEnvio2ColetaColeta5);

        /* invalidando o segundo envio */
        $eHistoricoEnvio2ColetaColeta5->addHistoricoStatus(
            $statusColetaInvalidadaConsolidacao,
            'sicam_comum',
            'Invalidação por repetição de envio',
            new \DateTime('2018/01/17')
        );
    }
}
