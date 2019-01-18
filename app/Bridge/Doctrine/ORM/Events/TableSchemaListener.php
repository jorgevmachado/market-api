<?php

namespace App\Bridge\Doctrine\ORM\Events;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LoadClassMetadataEventArgs;
use Doctrine\ORM\Events;

class TableSchemaListener implements EventSubscriber
{
    /**
     * @var string
     */
    protected $schema;

    /**
     * TableSchemaListener constructor.
     * @param string $schema
     */
    public function __construct(string $schema)
    {
        $this->schema = $schema;
    }


    public function getSubscribedEvents()
    {
        return [
            Events::loadClassMetadata
        ];
    }

    /**
     * @param LoadClassMetadataEventArgs $eventArgs
     */
    public function loadClassMetadata(LoadClassMetadataEventArgs $eventArgs)
    {
        $classMetadata = $eventArgs->getClassMetadata();
        $tableData = $classMetadata->table;

        if (isset($tableData['schema'])) {
            $this->schema = $tableData['schema'];
        } else {
            if ($this->schema !== env('DB_SCHEMA')) {
                $this->schema = env('DB_SCHEMA');
            }
            $tableData['schema'] = $this->schema;
        }

        $classMetadata->setPrimaryTable($tableData);
    }
}
