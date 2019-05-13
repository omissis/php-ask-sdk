<?php

declare(strict_types=1);

namespace Omissis\AlexaSdk\Serializer\Symfony;

use Omissis\AlexaSdk\Model\Skill\Manifest;
use Omissis\AlexaSdk\Model\Skill\Manifest\PublishingInformation;
use Omissis\AlexaSdk\Serializer\Deserializer;
use Omissis\AlexaSdk\Serializer\Format;
use Omissis\AlexaSdk\Serializer\Type;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer as SymfonySerializer;

final class SymfonyDeserializerAdapter implements Deserializer
{
    /**
     * @var SymfonySerializer
     */
    private $serializer;

    public function __construct()
    {
        $this->serializer = new SymfonySerializer(
            [new ObjectNormalizer(null, new ConstructorParameterNameConverter())],
            [new JsonEncoder()]
        );
    }

    public function deserialize(string $data, Format $inputFormat, Type $outputType)
    {
        return $this->serializer->deserialize($data, (string) $outputType, (string) $inputFormat, [
            'default_constructor_arguments' => [
                Manifest::class => ['events' => null, 'permissions' => null],
                PublishingInformation::class => ['distributionMode' => null],
            ],
        ]);
    }
}
