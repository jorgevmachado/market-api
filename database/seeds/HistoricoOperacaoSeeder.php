<?php

use Illuminate\Database\Seeder;

class HistoricoOperacaoSeeder extends Seeder
{
    /** @var \App\Repository\HistoricoOperacaoRepository */
    private $historicoOperacaoRepository;

    /** @var \Doctrine\ORM\EntityManager */
    private $em;


    public function __construct(
        \App\Repository\HistoricoOperacaoRepository $historicoOperacaoRepository,
        \Doctrine\ORM\EntityManager $em
    ){
        $this->historicoOperacaoRepository = $historicoOperacaoRepository;
        $this->em = $em;
    }

    public function run()
    {

        #TODO: falta definir os tipos de operação conformer a implementação for avançando

        $this->historicoOperacaoRepository->add(new \App\Entity\HistoricoOperacao(
            'D',
            'sicam_comum',
            new \DateTime(),
            'coleta',
            1,
            'Motivos pessoais'
        ));

        $this->historicoOperacaoRepository->add(new \App\Entity\HistoricoOperacao(
            'A',
            'sicam_comum',
            new \DateTime(),
            'material_coleta',
            1,
            null,
            'fg_estado_conservacao',
            'O'
        ));
        $this->em->flush();
    }

}