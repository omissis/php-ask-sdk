<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\InteractionModelSchema\InteractionModel\Dialog\Intent;

use Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\InteractionModel\Dialog\Intent\Slot;
use PHPUnit\Framework\TestCase;

final class SlotTest extends TestCase
{
    public function testItExposesAccessors(): void
    {
        $slot = new Slot('foobar', 'ProductName', true, false, [], null);

        $this->assertSame('foobar', $slot->getName());
        $this->assertSame('ProductName', $slot->getType());
        $this->assertTrue($slot->getElicitationRequired());
        $this->assertFalse($slot->getConfirmationRequired());
        $this->assertSame([], $slot->getPrompts());
        $this->assertNull($slot->getValidations());
    }
}
