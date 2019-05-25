<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\InteractionModelSchema\InteractionModel\LanguageModel\Intent;

use Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\InteractionModel\LanguageModel\Intent\Slot;
use PHPUnit\Framework\TestCase;

final class SlotTest extends TestCase
{
    public function testItExposesAccessors(): void
    {
        $type = new Slot('foobar', 'ProductName', ['foobar']);

        $this->assertSame('foobar', $type->getName());
        $this->assertSame('ProductName', $type->getType());
        $this->assertSame(['foobar'], $type->getSamples());
    }
}
