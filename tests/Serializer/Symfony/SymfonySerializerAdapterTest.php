<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Serializer\Symfony;

use Generator;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema;
use Omissis\AlexaSdk\Serializer\Format;
use Omissis\AlexaSdk\Serializer\Symfony\SymfonySerializerAdapter;
use PHPUnit\Framework\TestCase;

final class SymfonySerializerAdapterTest extends TestCase
{
    /**
     * @dataProvider serializationProvider
     */
    public function test_it_serializes(string $expectedString, ManifestSchema $data, Format $format): void
    {
        $actualString = (new SymfonySerializerAdapter())->serialize($data, $format);

        $this->assertJsonStringEqualsJsonString($expectedString, $actualString);
    }

    public function serializationProvider(): Generator
    {
        yield from SerializationProvider::provide();
    }
}
