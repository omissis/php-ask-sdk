<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Serializer\Symfony;

use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

final class CustomObjectNormalizer extends ObjectNormalizer
{
    /**
     * {@inheritDoc}
     */
    protected function instantiateObject(array &$data, $class, array &$context, \ReflectionClass $reflectionClass, $allowedAttributes/*, string $format = null*/)
    {
        $constructor = $reflectionClass->getConstructor();
        if ($constructor !== null && $constructor->getNumberOfParameters() === 1) {
            $paramName = $constructor->getParameters()[0]->getName();

            if (ucfirst($paramName) === $reflectionClass->getShortName()) {
                return new $class($data[0]);
            }
        }

        return parent::instantiateObject($data, $class, $context, $reflectionClass, $allowedAttributes);
    }

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
