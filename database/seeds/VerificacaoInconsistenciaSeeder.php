<?php

use Illuminate\Database\Seeder;

class VerificacaoInconsistenciaSeeder extends Seeder
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;

    /**
     * @var \App\Repository\VerificacaoInconsistenciaRepository
     */
    private $viRepository;


    public function __construct(
        \Doctrine\ORM\EntityManager $em,
        \App\Repository\VerificacaoInconsistenciaRepository $viRepository
    ){
        $this->em = $em;
        $this->viRepository = $viRepository;
    }

    public function run()
    {
        /* verificação SEM inconsistencia */
        $viEntity = new \App\Entity\VerificacaoInconsistencia(
            'TR1000MA1',
            new \DateTime(),
            $this->em->getReference(\App\Entity\Lotacao::class,2),
            $this->em->getReference(\App\Entity\Inventario::class,2)
        );

        $this->viRepository->add($viEntity);

        $viEntity->addhistoricosEnvioColeta(new \App\Entity\VerificacaoInconsistenciaEnvio(
            $viEntity,
            $this->em->getReference(\App\Entity\HistoricoEnvioColeta::class, 1)
        ));

        $this->viRepository->add($viEntity);

        /* FIM verificação SEM inconsistencia */

        $this->em->flush();
    }

}