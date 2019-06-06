<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Serializer\Symfony;

use Symfony\Component\Serializer\Exception\BadMethodCallException;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Exception\NotNormalizableValueException;
use Symfony\Component\Serializer\Normalizer\ContextAwareDenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\SerializerAwareInterface;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Denormalizes arrays of objects.
 *
 * @author Alexander M. Turek <me@derrabus.de>
 * @author Claudio Beatrice <claudi0.beatric3@gmail.com>
 */
// phpcs:disable SlevomatCodingStandard.Functions.UnusedParameter.UnusedParameter
class CustomArrayDenormalizer implements ContextAwareDenormalizerInterface, SerializerAwareInterface
{
  /**
   * @var SerializerInterface&DenormalizerInterface
   */
    private $serializer;

  /**
   * {@inheritDoc}
   *
   * @param mixed[] $data
   * @param string $class
   * @param null|string $format
   * @param mixed[] $context
   *
   * @return mixed[]
   *
   * @throws NotNormalizableValueException
   */
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (null === $this->serializer) {
            throw new BadMethodCallException('Please set a serializer before calling denormalize()!');
        }
        if (!\is_array($data)) {
            throw new InvalidArgumentException('Data expected to be an array, ' . \gettype($data) . ' given.');
        }
        if ('[]' !== substr($class, -2)) {
            throw new InvalidArgumentException('Unsupported class: ' . $class);
        }

        $baseClass = substr($class, 0, -2);
        $interfaceExists = interface_exists($baseClass);

        foreach ($data as $key => $value) {
            $concreteClass = $interfaceExists ? $baseClass . '\\' . ucfirst($key) : $baseClass;

            if (!class_exists($concreteClass)) {
                throw new \RuntimeException('');
            }

            $data[$key] = $this->serializer->denormalize($value, $concreteClass, $format, $context);
        }

        return $data;
    }

  /**
   * {@inheritdoc}
   */
    public function supportsDenormalization($data, $type, $format = null, array $context = [])
    {
        if ('[]' !== substr($type, -2)) {
            return false;
        }

        if (interface_exists(substr($type, 0, -2))) {
            return true;
        }

        return $this->serializer->supportsDenormalization($data, substr($type, 0, -2), $format);
    }

  /**
   * {@inheritdoc}
   */
    public function setSerializer(SerializerInterface $serializer)
    {
        if (!$serializer instanceof DenormalizerInterface) {
            throw new InvalidArgumentException('Expected a serializer that also implements DenormalizerInterface.');
        }

        $this->serializer = $serializer;
    }
}
//phpcs:enable
