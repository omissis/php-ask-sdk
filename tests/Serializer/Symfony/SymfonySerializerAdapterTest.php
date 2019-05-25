<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Serializer\Symfony;

use Generator;
use Omissis\AlexaSdk\Model\Skill\InteractionModelSchema;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema;
use Omissis\AlexaSdk\Serializer\Format;
use Omissis\AlexaSdk\Serializer\Symfony\SymfonySerializerAdapter;
use PHPUnit\Framework\TestCase;

final class SymfonySerializerAdapterTest extends TestCase
{
    /**
     * @param InteractionModelSchema|ManifestSchema $data
     *
     * @dataProvider serializationProvider
     */
    public function testItSerializes(string $expectedString, object $data, Format $format): void
    {
        $actualString = (new SymfonySerializerAdapter())->serialize($data, $format);

        $this->assertJsonStringEqualsJsonString($expectedString, $actualString);
    }

    public function serializationProvider(): Generator
    {
        yield from SerializationProvider::provide();
    }
}
