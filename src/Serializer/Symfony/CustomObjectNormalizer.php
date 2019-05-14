<?php

declare(strict_types=1);

namespace Omissis\AlexaSdk\Serializer\Symfony;

use Omissis\AlexaSdk\Model\Skill\Manifest\Api\HouseholdList;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;

final class CustomObjectNormalizer extends AbstractNormalizer
{
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        return null;
    }

    public function supportsDenormalization($data, $type, $format = null)
    {
        return false;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        if ($object instanceof HouseholdList) {
            return new \stdClass();
        }

        return null;
    }

    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof HouseholdList;
    }

}
