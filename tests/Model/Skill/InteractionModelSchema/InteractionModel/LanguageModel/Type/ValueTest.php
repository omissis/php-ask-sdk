<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\InteractionModelSchema\InteractionModel\LanguageModel\Type;

use Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\InteractionModel\LanguageModel\Type\Value;
use PHPUnit\Framework\TestCase;

final class ValueTest extends TestCase
{
    public function testItExposesAccessors(): void
    {
        $name = new Value\Name('foo');
        $id = new Value\Id('bar');

        $type = new Value($name, $id);

        $this->assertSame($name, $type->getName());
        $this->assertSame($id, $type->getId());
    }
}
