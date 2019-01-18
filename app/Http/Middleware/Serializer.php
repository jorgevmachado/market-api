<?php

namespace App\Http\Middleware;

use Doctrine\Common\Annotations\AnnotationRegistry;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use JMS\Serializer\SerializerBuilder;

class Serializer
{
    public function handle(Request $request, \Closure $next)
    {
        /** @var JsonResponse $response */
        $response = $next($request);
        $originalContent = $response->getOriginalContent();
        if (is_array($originalContent) && is_object(current($originalContent)) &&
            false !== strpos(get_class(current($originalContent)), 'App\Entity') ||
            is_object($originalContent) && false !== strpos(get_class($originalContent), 'App\Entity')
        ) {
            $serializer = SerializerBuilder::create()->build();
            $jsonContent = $serializer->serialize($originalContent, 'json');
            $response->setContent($jsonContent);
        }

        if (is_object($originalContent) && get_class($originalContent) === LengthAwarePaginator::class) {
            /** @var LengthAwarePaginator $originalContent */
            $serializer = SerializerBuilder::create()->build();
            $originalContent->setCollection(new Collection(
                json_decode($serializer->serialize($originalContent->items(), 'json'))
            ));
            $response->setContent($originalContent);
            return $originalContent;
        }

        return $response;
    }
}
