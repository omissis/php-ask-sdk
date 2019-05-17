<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Serializer\Symfony;

use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;

// phpcs:disable SlevomatCodingStandard.Functions.UnusedParameter.UnusedParameter
final class ValueObjectNormalizer extends AbstractNormalizer
{
    /**
     * {@inheritDoc}
     */
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        return new \stdClass();
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
        return (string) $object;
    }

    /**
     * {@inheritDoc}
     */
    public function supportsNormalization($data, $format = null)
    {
        return method_exists($data, '__toString');
    }
}
// phpcs:enable
