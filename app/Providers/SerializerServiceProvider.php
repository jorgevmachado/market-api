<?php

namespace App\Providers;

use Doctrine\Common\Annotations\AnnotationRegistry;
use Illuminate\Support\ServiceProvider;

class SerializerServiceProvider extends ServiceProvider
{
    public function register()
    {
        AnnotationRegistry::registerAutoloadNamespace(
            'JMS\Serializer\Annotation',
            base_path() . '/vendor/jms/serializer/src'
        );
    }
}
