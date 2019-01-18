<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use LaravelDoctrine\ORM\Configuration\Connections\ConnectionManager;

class DatabaseServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(ConnectionManager $connections)
    {

        $connections->extend(
            'oracle',
            function (array $settings, \Illuminate\Contracts\Container\Container $container) {
                return [
                    'driver' => 'oci8',
                    'driverClass' => \App\Bridge\Doctrine\DBAL\Driver\OCI8\Driver::class,
                    'host' => array_get($settings, 'host'),
                    'dbname' => array_get($settings, 'database'),
                    'servicename' => array_get($settings, 'service_name'),
                    'service' => array_get($settings, 'service'),
                    'user' => array_get($settings, 'username'),
                    'password' => array_get($settings, 'password'),
                    'charset' => array_get($settings, 'charset'),
                    'port' => array_get($settings, 'port'),
                    'prefix' => array_get($settings, 'prefix'),
                    'defaultTableOptions' => array_get($settings, 'defaultTableOptions', []),
                    'persistent' => array_get($settings, 'persistent'),
                ];
            }
        );

        $connections->extend(
            'sqlite',
            function (array $settings, \Illuminate\Contracts\Container\Container $container) {
                return [
                    'driver' => 'pdo_sqlite',
                    'driverClass' => \App\Bridge\Doctrine\DBAL\Driver\PDOSqlite\Driver::class,
                    'user' => array_get($settings, 'username'),
                    'password' => array_get($settings, 'password'),
                    'prefix' => array_get($settings, 'prefix'),
                    'memory' => Str::startsWith(array_get($settings, 'database'), ':memory'),
                    'path' => array_get($settings, 'database'),
                    'defaultTableOptions' => array_get($settings, 'defaultTableOptions', []),
                ];
            }
        );
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
