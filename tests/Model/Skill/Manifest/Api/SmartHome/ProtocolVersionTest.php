<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\Manifest\Api\SmartHome;

use Omissis\AlexaSdk\Model\Skill\Manifest\Api\SmartHome\InvalidProtocolVersionException;
use Omissis\AlexaSdk\Model\Skill\Manifest\Api\SmartHome\ProtocolVersion;
use PHPUnit\Framework\TestCase;

final class ProtocolVersionTest extends TestCase
{
    public function test_it_is_not_initializable_using_invalid_protocol_version(): void
    {
        $this->expectException(InvalidProtocolVersionException::class);

        new ProtocolVersion('0');
    }

    /**
     * @dataProvider protocolVersionProvider
     */
    public function test_it_is_convertible_to_string(string $protocolVersion): void
    {
        $this->assertSame($protocolVersion, (string) new ProtocolVersion($protocolVersion));
    }


    public function protocolVersionProvider(): \Generator
    {
        yield ['2'];
        yield ['3'];
    }
}
