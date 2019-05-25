<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\InteractionModelSchema\InteractionModel\LanguageModel\Type\Value;

use Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\InteractionModel\LanguageModel\Type\Value\Name;
use PHPUnit\Framework\TestCase;

final class NameTest extends TestCase
{
    public function testItExposesAccessors(): void
    {
        $name = new Name('foobar', ['foo']);

        $this->assertSame('foobar', $name->getValue());
        $this->assertSame(['foo'], $name->getSynonyms());
    }
}
