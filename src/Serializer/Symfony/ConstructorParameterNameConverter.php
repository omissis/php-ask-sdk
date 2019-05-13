<?php

declare(strict_types=1);

namespace Omissis\AlexaSdk\Serializer\Symfony;

use Symfony\Component\Serializer\NameConverter\AdvancedNameConverterInterface;

final class ConstructorParameterNameConverter implements AdvancedNameConverterInterface
{
    public function normalize($propertyName, string $class = null, string $format = null, array $context = [])
    {
        $reflectionClass = new \ReflectionClass($class);

        if ($propertyName === lcfirst($reflectionClass->getShortName())) {
            return 0;
        }

        return $propertyName;
    }

    public function denormalize($propertyName, string $class = null, string $format = null, array $context = [])
    {
        return $propertyName;
    }
}
