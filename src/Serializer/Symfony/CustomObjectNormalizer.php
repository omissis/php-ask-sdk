<?php

declare(strict_types=1);

namespace Omissis\AlexaSdk\Serializer\Symfony;

use Omissis\AlexaSdk\Model\Skill\Manifest\Api\HouseholdList;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;

final class CustomObjectNormalizer extends AbstractNormalizer
{
    /**
     * {@inheritDoc}
     */
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        throw new \RuntimeException(
            sprintf('Denormalization to "%s" is not supported by "%s".', $class, self::class)
        );
    }

    /**
     * {@inheritDoc}
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return false;
    }

    /**
     * {@inheritDoc}
     */
    public function normalize($object, $format = null, array $context = [])
    {
        if ($object instanceof HouseholdList) {
            return new \stdClass();
        }

        throw new \RuntimeException(
            sprintf('Object of class "%s" is not supported by "%s".', get_class($object), self::class)
        );
    }

    /**
     * {@inheritDoc}
     */
    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof HouseholdList;
    }
}
