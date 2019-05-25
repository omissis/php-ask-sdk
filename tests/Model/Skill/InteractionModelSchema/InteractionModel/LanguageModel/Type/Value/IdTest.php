<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\InteractionModelSchema\InteractionModel\LanguageModel\Type\Value;

use Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\InteractionModel\LanguageModel\Type\Value\Id;
use PHPUnit\Framework\TestCase;

final class IdTest extends TestCase
{
    public function testItIsConvertibleToString(): void
    {
        $this->assertSame('foobar', (string) new Id('foobar'));
    }
}
