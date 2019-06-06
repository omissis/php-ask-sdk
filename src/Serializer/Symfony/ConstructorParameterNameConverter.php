<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Serializer\Symfony;

use Symfony\Component\Serializer\NameConverter\NameConverterInterface;

// phpcs:disable SlevomatCodingStandard.Functions.UnusedParameter.UnusedParameter
final class ConstructorParameterNameConverter implements NameConverterInterface
{
  /**
   * {@inheritDoc}
   *
   * @return int|string
   */
    public function normalize($propertyName, string $class = null)
    {
        if ($class === null) {
            return $propertyName;
        }

        $reflectionClass = new \ReflectionClass($class);

        if ($propertyName === lcfirst($reflectionClass->getShortName())) {
            return 0;
        }

        return $propertyName;
    }

  /**
   * {@inheritDoc}
   */
    public function denormalize($propertyName): string
    {
        return $propertyName;
    }
}
// phpcs:enable
