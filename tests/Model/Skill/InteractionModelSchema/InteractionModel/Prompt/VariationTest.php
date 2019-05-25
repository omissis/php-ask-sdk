<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\InteractionModelSchema\InteractionModel\Prompt;

use Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\InteractionModel\Prompt\Variation;
use PHPUnit\Framework\TestCase;

final class VariationTest extends TestCase
{
    public function testItExposesAccessors(): void
    {
        $variation = new Variation('PlainText', 'foobar');

        $this->assertSame('PlainText', $variation->getType());
        $this->assertSame('foobar', $variation->getValue());
    }
}
