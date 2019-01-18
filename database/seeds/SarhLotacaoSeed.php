<?php

use Illuminate\Database\Seeder;

class SarhLotacaoSeed extends Seeder
{
    /** @var \App\Repository\LotacaoRepository */
    private $lotacaoRepository;

    /** @var \Doctrine\ORM\EntityManager */
    private $em;

    public function __construct(
        \App\Repository\LotacaoRepository $lotacaoRepository,
        \Doctrine\ORM\EntityManager $em
    ){
        $this->lotacaoRepository = $lotacaoRepository;
        $this->em = $em;
    }
    /**
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function run()
    {

        $lotacao1 = new \App\Entity\Lotacao(
            2,
            'TRIBUNAL REGIONAL FEDERAL DA PRIMEIRA REGIÃO',
            'TRF1'
        );

        $lotacao2 = new \App\Entity\Lotacao(
            7,
            'SEÇÃO JUDICIÁRIA DO DISTRITO FEDERAL',
            'SJDF'
        );
        $lotacao3 = new \App\Entity\Lotacao(
            8,
            'SEÇÃO JUDICIÁRIA DE GOIÁS',
            'SJGO'
        );

        $lotacao4 = new \App\Entity\Lotacao(
            74,
            'GABINETE JUIZ 1',
            'GABIN'
        );
        $this->lotacaoRepository->add($lotacao1);
        $this->lotacaoRepository->add($lotacao2);
        $this->lotacaoRepository->add($lotacao3);
        $this->lotacaoRepository->add($lotacao4);
        $this->em->flush();
    }


}