<?php

declare(strict_types=1);

namespace Omissis\AlexaSdk\Serializer\Symfony;

use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;

final class ValueObjectNormalizer extends AbstractNormalizer
{
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        return new \stdClass();
    }

    public function supportsDenormalization($data, $type, $format = null)
    {
        return false;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        return (string) $object;
    }

    public function supportsNormalization($data, $format = null)
    {
        return method_exists($data, '__toString');
    }
}
