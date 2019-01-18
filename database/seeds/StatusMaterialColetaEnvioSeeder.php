<?php

use Illuminate\Database\Seeder;

class StatusMaterialColetaEnvioSeeder extends Seeder
{
    /** @var \App\Repository\StatusMaterialColetaEnvioRepository */
    private $statusMaterialColetaEnvioRepository;

    /** @var \Doctrine\ORM\EntityManager */
    private $em;

    public function __construct(
        \App\Repository\StatusMaterialColetaEnvioRepository $repository,
        \Doctrine\ORM\EntityManager $em
    ){
        $this->statusMaterialColetaEnvioRepository = $repository;
        $this->em = $em;
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function run()
    {

        $this->statusMaterialColetaEnvioRepository->add(
            new \App\Entity\StatusMaterialColetaEnvio(1,'Enviado')
        );
        $this->statusMaterialColetaEnvioRepository->add(
            new \App\Entity\StatusMaterialColetaEnvio(2,'Excluído')
        );
        $this->statusMaterialColetaEnvioRepository->add(
            new \App\Entity\StatusMaterialColetaEnvio(3,'Estado de Conservação Alterado')
        );
        $this->statusMaterialColetaEnvioRepository->add(
            new \App\Entity\StatusMaterialColetaEnvio(4,'Inclusão de Imagem')
        );
        $this->statusMaterialColetaEnvioRepository->add(
            new \App\Entity\StatusMaterialColetaEnvio(5,'Alteração de Condição do Bem')
        );

        $this->em->flush();
    }
}