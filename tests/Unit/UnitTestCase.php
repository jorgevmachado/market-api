<?php

namespace Tests\Unit;

use App\Repository\EntityRepository;
use PHPUnit\Framework\TestCase;
use Mockery as M;

class UnitTestCase extends TestCase
{

    protected function getRepositoryMock($repository)
    {
        $mock = M::mock($repository);
        $mock->shouldReceive('add');
        $mock->shouldReceive('remove');
        return $mock;
    }

    public function invokeMethod(&$object, string $methodName, array $parameters = [])
    {
        $reflection = new \ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $parameters);
    }

    public function invokeProperty(&$object, string $propertyName)
    {
        $reflection = new \ReflectionClass(get_class($object));
        $property = $reflection->getProperty($propertyName);
        $property->setAccessible(true);

        return $property->getValue($object);
    }

    public function invokeSetProperty(&$object, string $propertyName, $value)
    {
        $reflection = new \ReflectionClass(get_class($object));
        $property = $reflection->getProperty($propertyName);
        $property->setAccessible(true);

        $property->setValue($object, $value);
        return $object;
    }
}
