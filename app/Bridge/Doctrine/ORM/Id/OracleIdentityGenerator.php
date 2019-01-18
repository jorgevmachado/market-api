<?php

namespace App\Bridge\Doctrine\ORM\Id;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Id\IdentityGenerator;

class OracleIdentityGenerator extends IdentityGenerator
{

    public function generate(EntityManager $em, $entity)
    {
        $classMetaData = $em->getClassMetadata(get_class($entity));
        //assumimos que só vai ter um ID, sempre
        $maxIdColumns = array_map(function ($columnaName) {
            return 'max(' . $columnaName . ') as ' . $columnaName;
        }, $classMetaData->getIdentifierColumnNames());

        $tableName = $classMetaData->getTableName();

        if (($schema = $classMetaData->getSchemaName()) || ($schema = env('DB_SCHEMA'))) {
            $tableName = $schema . '.' . $tableName;
        }

        $result = $em->getConnection()->fetchAssoc(
            'select ' . implode($maxIdColumns) . ' FROM ' . $tableName
        );

        if (count($result) > 1) {
            return $result;
        }

        return current($result);
    }

    public function isPostInsertGenerator()
    {
        return true;
    }
}
