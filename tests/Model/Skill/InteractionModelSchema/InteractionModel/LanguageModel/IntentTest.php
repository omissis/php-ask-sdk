<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\InteractionModelSchema\InteractionModel\LanguageModel;

use Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\InteractionModel\LanguageModel\Intent;
use PHPUnit\Framework\TestCase;

final class IntentTest extends TestCase
{
    public function testItExposesAccessors(): void
    {
        $slots = [$this->prophesize(Intent\Slot::class)->reveal()];
        $samples = [$this->prophesize(Intent\Sample::class)->reveal()];

        $type = new Intent('foobar', $slots, $samples);

        $this->assertSame('foobar', $type->getName());
        $this->assertSame($slots, $type->getSlots());
        $this->assertSame($samples, $type->getSamples());
    }
}
