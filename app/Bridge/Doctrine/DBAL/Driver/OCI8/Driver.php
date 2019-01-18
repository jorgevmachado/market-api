<?php

namespace App\Bridge\Doctrine\DBAL\Driver\OCI8;

use App\Bridge\Doctrine\DBAL\Platforms\OraclePlatform;

class Driver extends \Doctrine\DBAL\Driver\OCI8\Driver
{
    public function getDatabasePlatform()
    {
        return new OraclePlatform();
    }
}
