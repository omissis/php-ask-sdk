<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\InteractionModelSchema\InteractionModel\LanguageModel;

use Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\InteractionModel\LanguageModel\InvocationName;
use PHPUnit\Framework\TestCase;

final class InvocationNameTest extends TestCase
{
    public function testItIsConvertibleToString(): void
    {
        $this->assertSame('drupalexa', (string) new InvocationName('drupalexa'));
    }
}
