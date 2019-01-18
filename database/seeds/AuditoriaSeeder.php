<?php

use Illuminate\Database\Seeder;

class AuditoriaSeeder extends Seeder
{
    /** @var \App\Repository\AuditoriaRepository */
    private $auditoriaRepository;

    /** @var \Doctrine\ORM\EntityManager */
    private $em;

    public function __construct(
        \App\Repository\AuditoriaRepository $auditoriaRepository,
        \Doctrine\ORM\EntityManager $em
    ){
        $this->auditoriaRepository = $auditoriaRepository;
        $this->em = $em;
    }
    /**
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function run()
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>
                    <schema><nome>SICAM</nome><rota>api/coleta/{coletum}</rota>
                        <tabela>
                            <nome>material_coleta</nome>
                            <coluna><nome>nu_material_coleta</nome><valor>3</valor></coluna>
                            <coluna><nome>ti_tombo</nome><valor>T</valor></coluna>
                            <coluna><nome>de_tombo</nome><valor>descrição do tombo</valor></coluna>
                            <coluna><nome>de_observacao</nome><valor>observação da parada</valor></coluna>
                            <coluna><nome>nu_lotacao</nome><valor>1</valor></coluna>
                            <coluna><nome>nu_tombo</nome><valor>29279</valor></coluna>
                            <coluna><nome>nu_arquivo_red</nome><valor></valor></coluna>
                            <coluna><nome>fg_encontrado</nome><valor>1</valor></coluna>
                            <coluna><nome>dt_coleta_material</nome><valor>2018-11-10 00:00:00</valor></coluna>
                            <coluna><nome>dt_ultima_alteracao</nome><valor>2018-11-10 00:00:00</valor></coluna>
                            <coluna><nome>fg_ativo</nome><valor>0</valor></coluna>
                            <coluna><nome>nu_coleta</nome><valor>2</valor></coluna>
                        </tabela>
                    </schema>';

        $auditoria = new \App\Entity\Auditoria();
        $auditoria->setId(1)
            ->setTipoOperacao('U')
            ->setDataOperacao(new \DateTime())
            ->setMatricula('TR00001')
            ->setNomeTabela('material_coleta')
            ->setNumeroRegistroLogado(1)
            ->setXml($xml);

        $this->auditoriaRepository->add($auditoria);
        $this->em->flush();
    }

}