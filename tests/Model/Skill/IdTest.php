<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill;

use Omissis\AlexaSdk\Model\Skill;
use PHPUnit\Framework\TestCase;

final class IdTest extends TestCase
{
    private const TEST_WRONG_ID = 'foo-bar-baz-quux';
    private const TEST_CORRECT_ID = 'amzn1.ask.skill.00000001-0002-0003-0004-000000000005';


    public function test_it_is_not_initializable_using_a_wrong_id(): void
    {
        $this->expectException(Skill\InvalidIdFormatException::class);

        new Skill\Id(self::TEST_WRONG_ID);
    }

    public function test_it_is_convertible_to_string(): void
    {
        $this->assertSame(self::TEST_CORRECT_ID, (string) new Skill\Id(self::TEST_CORRECT_ID));
    }
}
