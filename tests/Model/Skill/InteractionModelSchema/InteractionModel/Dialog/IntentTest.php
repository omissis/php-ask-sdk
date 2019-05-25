<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\InteractionModelSchema\InteractionModel\Dialog;

use Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\InteractionModel\Dialog\Intent;
use PHPUnit\Framework\TestCase;

final class IntentTest extends TestCase
{
    public function testItExposesAccessors(): void
    {
        $slots = [$this->prophesize(Intent\Slot::class)->reveal()];
        $prompts = ['baz', 'quux'];

        $intent = new Intent('foobar', 'ALWAYS', $slots, true, $prompts);

        $this->assertSame('foobar', $intent->getName());
        $this->assertSame('ALWAYS', $intent->getDelegationStrategy());
        $this->assertSame($slots, $intent->getSlots());
        $this->assertTrue($intent->getConfirmationRequired());
        $this->assertSame($prompts, $intent->getPrompts());
    }
}
