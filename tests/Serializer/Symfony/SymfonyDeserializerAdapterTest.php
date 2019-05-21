<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Serializer\Symfony;

use Generator;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema;
use Omissis\AlexaSdk\Serializer\Format;
use Omissis\AlexaSdk\Serializer\Symfony\SymfonyDeserializerAdapter;
use Omissis\AlexaSdk\Serializer\Type;
use PHPUnit\Framework\TestCase;

final class SymfonyDeserializerAdapterTest extends TestCase
{
    /**
     * @dataProvider deserializationProvider
     */
    public function testItDeserializes(string $data, ManifestSchema $expectedObject, Format $format): void
    {
        $actualObject = (new SymfonyDeserializerAdapter())->deserialize($data, $format, Type::skillManifestSchema());

        $this->assertEquals($expectedObject, $actualObject);
    }

    public function deserializationProvider(): Generator
    {
        yield from SerializationProvider::provide();
    }
}
