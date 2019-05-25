<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\InteractionModelSchema\InteractionModel\LanguageModel;

use Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\InteractionModel\LanguageModel\Type;
use PHPUnit\Framework\TestCase;

final class TypeTest extends TestCase
{
    public function testItExposesAccessors(): void
    {
        $type = new Type('foobar', []);

        $this->assertSame('foobar', $type->getName());
        $this->assertSame([], $type->getValues());
    }
}
