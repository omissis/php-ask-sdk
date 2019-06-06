<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Serializer\Symfony;

use Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\InteractionModel\Dialog\Intent;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

// phpcs:disable SlevomatCodingStandard.Functions.UnusedParameter.UnusedParameter
final class DialogIntentNormalizer extends ObjectNormalizer
{
    /**
     * {@inheritDoc}
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $normalized = parent::normalize($object, $format, $context);

        if (is_array($normalized) && (!isset($normalized['prompts']) || count($normalized['prompts']) === 0)) {
            $normalized['prompts'] = new \stdClass();
        }

        if (is_array($normalized) && isset($context['skip_null_values']) && $context['skip_null_values'] === true) {
            return array_filter($normalized, static function ($value): bool {
                return null !== $value;
            });
        }

        return $normalized;
    }

    /**
     * {@inheritDoc}
     */
    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof Intent;
    }
}
// phpcs:enable
