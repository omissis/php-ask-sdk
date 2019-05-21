<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\ManifestSchema\Manifest\Events;

use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Events\EventName;
use PHPUnit\Framework\TestCase;

final class EventNameTest extends TestCase
{
    public function testItIsConvertibleToString(): void
    {
        $this->assertSame('SKILL_ENABLED', (string) new EventName('SKILL_ENABLED'));
    }
}
