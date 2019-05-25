<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\InteractionModelSchema\InteractionModel\Dialog\Intent\Slot;

use Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\InteractionModel\Dialog\Intent\Slot\Validation;
use PHPUnit\Framework\TestCase;

final class ValidationTest extends TestCase
{
    public function testItExposesAccessors(): void
    {
        $type = new Validation('isNotInSet', 'Slot.Validation.12.34.56', ['foo', 'bar']);

        $this->assertSame('isNotInSet', $type->getType());
        $this->assertSame('Slot.Validation.12.34.56', $type->getPrompt());
        $this->assertSame(['foo', 'bar'], $type->getValues());
    }
}
