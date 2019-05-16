<?php

declare(strict_types=1);

namespace Omissis\AlexaSdk\Serializer\Symfony;

use Symfony\Component\Serializer\NameConverter\NameConverterInterface;

final class IsserNameConverter implements NameConverterInterface
{
    private const KNOWN_ISSER_PROPERTIES = [
        'availableWorldwide',
        'childDirected',
        'exportCompliant',
        'default',
    ];

    public function normalize($propertyName)
    {
        if (in_array($propertyName, self::KNOWN_ISSER_PROPERTIES, true)) {
            return 'is'.ucfirst($propertyName);
        }

        return $propertyName;
    }

    public function denormalize($propertyName)
    {
        return substr($propertyName, 0, 2) === 'is' ? substr($propertyName, 2) : $propertyName;
    }
}
