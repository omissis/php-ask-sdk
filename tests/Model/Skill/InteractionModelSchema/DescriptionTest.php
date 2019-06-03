<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\InteractionModelSchema;

use Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\Description;
use PHPUnit\Framework\TestCase;

final class DescriptionTest extends TestCase
{
    public function testItIsConvertibleToString(): void
    {
        $this->assertSame('foo bar baz quux', (string) new Description('foo bar baz quux'));
    }
}
