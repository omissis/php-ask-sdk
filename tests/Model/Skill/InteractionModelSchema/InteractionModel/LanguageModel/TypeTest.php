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

    public function testItExposesMutators(): void
    {
        $newValues = [
            new Type\Value(new Type\Value\Name('test'), new Type\Value\Id('1234')),
        ];

        $type = new Type('foobar', []);

        $type->setName('bazquux');
        $type->setValues($newValues);

        $this->assertSame('bazquux', $type->getName());
        $this->assertSame($newValues, $type->getValues());
    }
}
