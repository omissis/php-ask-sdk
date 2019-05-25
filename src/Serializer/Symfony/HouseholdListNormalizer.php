<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Serializer\Symfony;

use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\HouseholdList;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

// phpcs:disable SlevomatCodingStandard.Functions.UnusedParameter.UnusedParameter
final class HouseholdListNormalizer extends ObjectNormalizer
{
    /**
     * {@inheritDoc}
     */
    public function normalize($object, $format = null, array $context = [])
    {
        return new \stdClass();
    }

    /**
     * {@inheritDoc}
     */
    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof HouseholdList;
    }
}
// phpcs:enable
