<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Serializer\Symfony;

use Omissis\AlexaSdk\Serializer\Format;
use Omissis\AlexaSdk\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Serializer as SymfonySerializer;

final class SymfonySerializerAdapter implements Serializer
{
    /**
     * @var SymfonySerializer
     */
    private $serializer;

    public function __construct()
    {
        $this->serializer = new SymfonySerializer(
            [new DialogIntentNormalizer(), new HouseholdListNormalizer(), new ValueObjectNormalizer(), new CustomObjectNormalizer(null, new IsserNameConverter())],
            [new JsonEncoder()]
        );
    }

    /**
     * @param mixed $data
     */
    public function serialize($data, Format $format): string
    {
        return $this->serializer->serialize($data, (string) $format, ['skip_null_values' => true]);
    }
}
