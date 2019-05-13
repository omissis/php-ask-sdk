<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\Manifest\PublishingInformation;

use Omissis\AlexaSdk\Model\Skill\Manifest\PublishingInformation;
use Omissis\AlexaSdk\Model\Skill\Manifest\PublishingInformation\DistributionMode;
use Omissis\AlexaSdk\Model\Skill\Manifest\PublishingInformation\InvalidDistributionModeException;
use PHPUnit\Framework\TestCase;

final class DistributionModeTest extends TestCase
{
    private const TEST_PUBLIC = 'PUBLIC';
    private const TEST_PRIVATE = 'PRIVATE';
    private const TEST_WRONG = 'foobar';

    function test_is_not_initializable_using_a_wrong_value()
    {
        $this->expectException(InvalidDistributionModeException::class);

        new DistributionMode(self::TEST_WRONG);
    }

    /**
     * @dataProvider distributionModeProvider
     */
    function test_is_convertible_to_string(string $distributionMode): void
    {
        $this->assertSame($distributionMode, (string) new DistributionMode($distributionMode));
    }

    public function distributionModeProvider(): \Generator
    {
        yield [self::TEST_PRIVATE];
        yield [self::TEST_PUBLIC];
    }
}
