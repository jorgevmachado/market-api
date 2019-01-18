<?php

namespace App\Providers;

use App\Models\Foo;
use App\Repositories\FooRepository;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\Finder\Finder;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $finder = new Finder();
        $finder->files()->in(realpath(__DIR__ . '/../Repository'));
        foreach ($finder as $file) {
            $entityName = str_replace('Repository.php', '', $file->getFilename());
            $entityClassName = 'App\\Entity\\' . $entityName;
            $this->app->bind(
                'App\Repository\\' . $entityName . 'Repository',
                function () use ($entityClassName) {
                    return \EntityManager::getRepository($entityClassName);
                }
            );
        }
    }
}
