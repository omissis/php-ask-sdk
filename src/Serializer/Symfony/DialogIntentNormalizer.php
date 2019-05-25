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
