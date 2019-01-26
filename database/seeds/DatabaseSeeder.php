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
        $this->call(EstadoSeeder::class);
        $this->call(CidadeSeeder::class);
        $this->call(FabricanteSeeder::class);
        $this->call(UnidadeSeeder::class);
        $this->call(TipoSeeder::class);
        $this->call(ProdutoSeeder::class);
        $this->call(GrupoSeeder::class);
        $this->call(PessoaSeeder::class);
        $this->call(VendaSeeder::class);
        $this->call(ItemVendaSeeder::class);
        $this->call(ContaSeeder::class);
        $this->call(PessoaGrupoSeeder::class);
        $this->call(LogSeeder::class);
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
