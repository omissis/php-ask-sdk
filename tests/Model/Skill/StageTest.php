<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill;

use Omissis\AlexaSdk\Model\Skill;
use Omissis\AlexaSdk\Model\Skill\Stage;
use PHPUnit\Framework\TestCase;

final class StageTest extends TestCase
{
    function test_it_is_not_initializable_using_a_wrong_stage_name(): void
    {
        $this->expectException(Skill\InvalidStageException::class);

        new Stage('foobar');
    }

    /**
     * @dataProvider stageProvider
     */
    function test_it_is_convertible_to_string(string $stage): void
    {
        $this->assertSame($stage, (string) new Stage($stage));
    }

    public function stageProvider(): \Generator
    {
        yield ['development'];
        yield ['live'];
    }
}
