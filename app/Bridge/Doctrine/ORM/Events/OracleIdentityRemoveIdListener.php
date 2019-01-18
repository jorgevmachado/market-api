<?php

namespace App\Bridge\Doctrine\ORM\Events;

use Doctrine\Common\EventSubscriber;
use Doctrine\Common\EventArgs;
use Doctrine\ORM\Event\LoadClassMetadataEventArgs;
use Doctrine\ORM\Event\OnFlushEventArgs;
use Doctrine\ORM\Events;
use Doctrine\ORM\Mapping\ClassMetadata;

class OracleIdentityRemoveIdListener implements EventSubscriber
{

    public function getSubscribedEvents()
    {
        return [
            Events::loadClassMetadata
        ];
    }

    public function loadClassMetadata(EventArgs $eventArgs)
    {
        /** @var \Doctrine\ORM\Mapping\ClassMetadata $classMetadata */
        $classMetadata = $eventArgs->getClassMetadata();
        if ($classMetadata->generatorType !== ClassMetadata::GENERATOR_TYPE_CUSTOM) {
            return;
        }
        $classMetadata->setIdGeneratorType(ClassMetadata::GENERATOR_TYPE_IDENTITY);
    }
}
