<?php

use Illuminate\Database\Seeder;

class ProcessualSecSubsecSeed extends Seeder
{
    /** @var \App\Repository\SecSubsecRepository */
    private $secSubsecRepository;

    /** @var \Doctrine\ORM\EntityManager */
    private $em;

    public function __construct(
        \App\Repository\SecSubsecRepository $secSubsecRepository,
        \Doctrine\ORM\EntityManager $em
    ){
        $this->secSubsecRepository = $secSubsecRepository;
        $this->em = $em;
    }
    /**
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function run()
    {
        $secSubsec1 = new \App\Entity\SecSubsec(
            3820,
            'SUBSEÇÃO JUDICIÁRIA DE CONTAGEM',
            'CEM'
        );

        $secSubsec2 = new \App\Entity\SecSubsec(
            3821,
            'SUBSEÇÃO JUDICIÁRIA DE MURIAÉ',
            'MRE'
        );
        $this->secSubsecRepository->add($secSubsec1);
        $this->secSubsecRepository->add($secSubsec2);
        $this->em->flush();
    }
}