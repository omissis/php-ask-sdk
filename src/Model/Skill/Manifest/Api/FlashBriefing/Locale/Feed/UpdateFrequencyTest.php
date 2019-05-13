<?php

declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\Manifest\Api\FlashBriefing\Locale\Feed;

use PHPUnit\Framework\TestCase;

final class UpdateFrequencyTest extends TestCase
{
    /**
     * @dataProvider updateFrequencyProvider
     */
    function test_it_is_convertible_to_string(string $updateFrequency): void
    {
        $this->assertSame($updateFrequency, (string) new UpdateFrequency($updateFrequency));
    }

    function test_it_is_not_initializable_with_wrong_frequency(): void
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
