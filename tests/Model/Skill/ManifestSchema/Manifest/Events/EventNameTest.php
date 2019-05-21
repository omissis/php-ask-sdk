<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\ManifestSchema\Manifest\Events;

use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Events\EventName;
use PHPUnit\Framework\TestCase;

final class EventNameTest extends TestCase
{
    public function test_it_is_convertible_to_string(): void
    {
        $this->assertSame('SKILL_ENABLED', (string) new EventName('SKILL_ENABLED'));
    }
}
