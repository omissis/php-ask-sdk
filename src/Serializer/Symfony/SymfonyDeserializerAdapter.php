<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Serializer\Symfony;

use Doctrine\Common\Annotations\AnnotationReader;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest;
use Omissis\AlexaSdk\Serializer\Deserializer;
use Omissis\AlexaSdk\Serializer\Format;
use Omissis\AlexaSdk\Serializer\Type;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\Serializer as SymfonySerializer;

final class SymfonyDeserializerAdapter implements Deserializer
{
  /**
   * @var SymfonySerializer
   */
    private $serializer;

    public function __construct()
    {
        $classMetaDataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));

        $this->serializer = new SymfonySerializer(
            [
                new CustomArrayDenormalizer(),
                new CustomObjectNormalizer($classMetaDataFactory, new ConstructorParameterNameConverter(), null, new PhpDocExtractor()),
            ],
            [new JsonEncoder()]
        );
    }

  /**
   * {@inheritDoc}
   */
    public function deserialize(string $data, Format $inputFormat, Type $outputType)
    {
        return $this->serializer->deserialize($data, (string)$outputType, (string)$inputFormat, [
            'default_constructor_arguments' => [
                Manifest\Events::class => ['publications' => null, 'subscriptions' => null],
            ],
        ]);
    }
}
