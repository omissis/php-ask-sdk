<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\InteractionModelSchema\InteractionModel\LanguageModel\Intent;

use Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\InteractionModel\LanguageModel\Intent\Sample;
use PHPUnit\Framework\TestCase;

final class SampleTest extends TestCase
{
    public function testItIsConvertibleToString(): void
    {
        $this->assertSame('foobar', (string) new Sample('foobar'));
    }
}
