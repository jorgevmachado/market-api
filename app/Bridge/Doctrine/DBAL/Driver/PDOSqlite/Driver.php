<?php

namespace App\Bridge\Doctrine\DBAL\Driver\PDOSqlite;

use App\Bridge\Doctrine\DBAL\Platforms\SqlitePlatform;

class Driver extends \Doctrine\DBAL\Driver\PDOSqlite\Driver
{
    public function getDatabasePlatform()
    {
        return new SqlitePlatform();
    }
}
