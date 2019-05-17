<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Serializer\Symfony;

use Symfony\Component\Serializer\Exception\BadMethodCallException;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Exception\NotNormalizableValueException;
use Symfony\Component\Serializer\Normalizer\CacheableSupportsMethodInterface;
use Symfony\Component\Serializer\Normalizer\ContextAwareDenormalizerInterface;
use Symfony\Component\Serializer\SerializerAwareInterface;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Denormalizes arrays of objects.
 *
 * @author Alexander M. Turek <me@derrabus.de>
 * @author Claudio Beatrice <claudi0.beatric3@gmail.com>
 *
 * @final
 */
class CustomArrayDenormalizer implements ContextAwareDenormalizerInterface, SerializerAwareInterface, CacheableSupportsMethodInterface
{
    /**
     * @var SerializerInterface&ContextAwareDenormalizerInterface
     */
    private $serializer;

    /**
     * @param array $data
     * @param string $class
     * @param null|string $format
     *
     * @return object|array
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

        return $this->serializer->supportsDenormalization($data, substr($type, 0, -2), $format, $context);
    }

    /**
     * {@inheritdoc}
     */
    public function setSerializer(SerializerInterface $serializer)
    {
        if (!$serializer instanceof ContextAwareDenormalizerInterface) {
            throw new InvalidArgumentException('Expected a serializer that also implements DenormalizerInterface.');
        }

        $this->serializer = $serializer;
    }

    /**
     * {@inheritdoc}
     */
    public function hasCacheableSupportsMethod(): bool
    {
        return $this->serializer instanceof CacheableSupportsMethodInterface && $this->serializer->hasCacheableSupportsMethod();
    }
}
