<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\ManifestSchema\Manifest\Api\SmartHome;

use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\SmartHome\InvalidProtocolVersionException;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\SmartHome\ProtocolVersion;
use PHPUnit\Framework\TestCase;

final class ProtocolVersionTest extends TestCase
{
    public function testItIsNotInitializableUsingInvalidProtocolVersion(): void
    {
        $this->expectException(InvalidProtocolVersionException::class);

        new ProtocolVersion('0');
    }

    /**
     * @dataProvider protocolVersionProvider
     */
    public function testItIsConvertibleToString(string $protocolVersion): void
    {
        $this->assertSame($protocolVersion, (string) new ProtocolVersion($protocolVersion));
    }


    public function protocolVersionProvider(): \Generator
    {
        yield ['2'];
        yield ['3'];
    }
}
