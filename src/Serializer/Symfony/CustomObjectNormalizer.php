<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Serializer\Symfony;

use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

final class CustomObjectNormalizer extends ObjectNormalizer
{
    /**
     * {@inheritDoc}
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $data = parent::normalize($object, $format, $context);

        if (is_array($data) && isset($context['skip_null_values']) && $context['skip_null_values'] === true) {
            return array_filter($data, static function ($value): bool {
                return null !== $value;
            });
        }

        return $data;
    }
}
