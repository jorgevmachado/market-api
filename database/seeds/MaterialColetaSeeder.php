<?php

use Illuminate\Database\Seeder;

class MaterialColetaSeeder extends Seeder
{
    /** @var \App\Repository\MaterialColetaRepository */
    private $materialColetaRepository;

    /** @var \Doctrine\ORM\EntityManager */
    private $em;

    public function __construct(
        \App\Repository\MaterialColetaRepository $materialColetaRepository,
        \Doctrine\ORM\EntityManager $em
    ) {
        $this->materialColetaRepository = $materialColetaRepository;
        $this->em = $em;
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function run()
    {
        $lotacao = $this->em->getReference(\App\Entity\Lotacao::class, 2);

        //Colet 1
        //encontrado
        $this->materialColetaRepository->add(
            new \App\Entity\MaterialColeta(
                $this->em->getReference(\App\Entity\TipoTombo::class, 'T'),
                'Tombo de uma coleta.',
                'Tudo certo com o tombo.',
                $this->em->getReference(\App\Entity\Coleta::class, 1),
                $lotacao,
                '1',
                new \DateTime('2018/01/01'),
                new \DateTime('2018/02/02'),
                'sicam_leitor',
                15243
            )
        );
        //não encontrado
        $this->materialColetaRepository->add(
            new \App\Entity\MaterialColeta(
                $this->em->getReference(\App\Entity\TipoTombo::class, 'T'),
                'Tombo de uma coleta.',
                'Tudo certo com o tombo.',
                $this->em->getReference(\App\Entity\Coleta::class, 1),
                $lotacao,
                '0',
                new \DateTime('2018/01/01'),
                new \DateTime('2018/02/02'),
                'sicam_leitor',
                15244
            )
        );

        //sem etiqueta
        $this->materialColetaRepository->add(
            new \App\Entity\MaterialColeta(
                $this->em->getReference(\App\Entity\TipoTombo::class, 'T'),
                'Tombo de uma coleta.',
                'Tudo certo com o tombo.',
                $this->em->getReference(\App\Entity\Coleta::class, 1),
                $lotacao,
                '1',
                new \DateTime('2018/01/01'),
                new \DateTime('2018/02/02'),
                'sicam_leitor'
            )
        );

        //outra lotação
        $this->materialColetaRepository->add(
            new \App\Entity\MaterialColeta(
                $this->em->getReference(\App\Entity\TipoTombo::class, 'T'),
                'Tombo de uma coleta.',
                'Tudo certo com o tombo.',
                $this->em->getReference(\App\Entity\Coleta::class, 1),
                $this->em->getReference(\App\Entity\Lotacao::class, 7),
                '2',
                new \DateTime('2018/01/01'),
                new \DateTime('2018/02/02'),
                'sicam_leitor',
                15000
            )
        );

        //Coleta 2
        $this->materialColetaRepository->add(
            new \App\Entity\MaterialColeta(
                $this->em->getReference(\App\Entity\TipoTombo::class, 'T'),
                'Tombo de uma coleta.',
                'Tudo certo com o tombo.',
                $this->em->getReference(\App\Entity\Coleta::class, 2),
                $lotacao,
                '1',
                new \DateTime('2018/01/01'),
                new \DateTime('2018/02/02'),
                'sicam_leitor',
                15244,
                'D',
                123456789,
                '1',
                '0',
                'd980dfadf980809df786dsf876sa786'
            )
        );

        $this->em->flush();
    }
}
