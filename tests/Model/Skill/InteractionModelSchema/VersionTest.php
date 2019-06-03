<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\InteractionModelSchema;

use Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\Version;
use PHPUnit\Framework\TestCase;

final class VersionTest extends TestCase
{
    public function testItIsConvertibleToString(): void
    {
        $this->assertSame('2', (string) new Version('2'));
    }
}
