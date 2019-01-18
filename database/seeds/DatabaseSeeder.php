<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->init();
        $this->call(StatusMaterialColetaEnvioSeeder::class);
        $this->call(StatusConsolidacaoSeeder::class);
        $this->call(StatusColetaSeeder::class);
        $this->call(TermoCienciaSeeder::class);
        $this->call(MaterialSeeder::class);
        $this->call(TipoPeriodoSeeder::class);
        $this->call(TipoTermoSeeder::class);
        $this->call(TermoSeeder::class);
        $this->call(TipoTomboSeeder::class);
        $this->call(TomboSeeder::class);
        $this->call(InventarioSeeder::class);
        $this->call(ProcessualSecSubsecSeed::class);
        $this->call(SarhLotacaoSeed::class);
        $this->call(ColetaSeeder::class);
        $this->call(MaterialColetaSeeder::class);
        $this->call(TipoMembroSeeder::class);
        $this->call(MembroInventarioSeeder::class);
        $this->call(VerificacaoInconsistenciaSeeder::class);
        $this->call(AuditoriaSeeder::class);
        $this->call(HistoricoOperacaoSeeder::class);
        $this->call(VwHistoricoTramiteColetaSeeder::class);
    }

    private function init()
    {
        $this->initJmsAnnotation();
        $this->initOracle();

    }

    private function initJmsAnnotation()
    {
        \Doctrine\Common\Annotations\AnnotationRegistry::registerAutoloadNamespace(
            'JMS\Serializer\Annotation',
            base_path() . '/vendor/jms/serializer/src'
        );
    }

    private function initOracle()
    {
        /** @var \Doctrine\ORM\EntityManager $entityManager */
        $entityManager = app(\Doctrine\ORM\EntityManager::class);
        /** @var \Doctrine\DBAL\Connection $connection */
        $connection = $entityManager->getConnection();
        if ($connection->getDriver()->getName() !== 'oci8') {
            return;
        }
        $oracleInitSession = new \Doctrine\DBAL\Event\Listeners\OracleSessionInit([]);
        $connectionEventArguments = new \Doctrine\DBAL\Event\ConnectionEventArgs($connection);
        $oracleInitSession->postConnect($connectionEventArguments);
    }
}
