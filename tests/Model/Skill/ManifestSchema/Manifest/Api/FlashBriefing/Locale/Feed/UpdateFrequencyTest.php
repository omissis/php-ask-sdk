<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\ManifestSchema\Manifest\Api\FlashBriefing\Locale\Feed;

use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\FlashBriefing\Locale\Feed\InvalidUpdateFrequencyException;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\FlashBriefing\Locale\Feed\UpdateFrequency;
use PHPUnit\Framework\TestCase;

final class UpdateFrequencyTest extends TestCase
{
    /**
     * @dataProvider updateFrequencyProvider
     */
    public function testItIsConvertibleToString(string $updateFrequency): void
    {
        $this->assertSame($updateFrequency, (string) new UpdateFrequency($updateFrequency));
    }

    public function testItIsNotInitializableWithWrongFrequency(): void
    {
        $this->expectException(InvalidUpdateFrequencyException::class);

        new UpdateFrequency('FOO');
    }

    public function updateFrequencyProvider(): \Generator
    {
        yield ['WEEKLY'];
        yield ['DAILY'];
        yield ['HOURLY'];
    }
}
