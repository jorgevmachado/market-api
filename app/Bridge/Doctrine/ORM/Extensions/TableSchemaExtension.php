<?php

namespace App\Bridge\Doctrine\ORM\Extensions;

use App\Bridge\Doctrine\ORM\Events\TableSchemaListener;
use Doctrine\Common\Annotations\Reader;
use Doctrine\Common\EventManager;
use Doctrine\ORM\EntityManagerInterface;
use LaravelDoctrine\ORM\Extensions\Extension;

class TableSchemaExtension implements Extension
{

    public function getFilters()
    {
        return [];
    }
    /**
     * @param EventManager           $manager
     * @param EntityManagerInterface $em
     * @param Reader|null            $reader
     */
    public function addSubscribers(EventManager $manager, EntityManagerInterface $em, Reader $reader = null)
    {
        $schema = env('DB_SCHEMA');
        if (!$schema) {
            return;
        }
        $manager->addEventSubscriber(new TableSchemaListener($schema));
    }
}
