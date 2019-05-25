<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\InteractionModelSchema\InteractionModel;

use Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\InteractionModel\Prompt;
use PHPUnit\Framework\TestCase;

final class PromptTest extends TestCase
{
    public function testItExposesAccessors(): void
    {
        $variations = [$this->prophesize(Prompt\Variation::class)->reveal()];
        $prompt = new Prompt('foobar', $variations);

        $this->assertSame('foobar', $prompt->getId());
        $this->assertSame($variations, $prompt->getVariations());
    }
}
