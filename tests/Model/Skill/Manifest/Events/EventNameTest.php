<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\Manifest\Events;

use Omissis\AlexaSdk\Model\Skill\Manifest\Events\EventName;
use PHPUnit\Framework\TestCase;

final class EventNameTest extends TestCase
{
    function test_it_is_convertible_to_string(): void
    {
        $this->assertSame('SKILL_ENABLED', (string) new EventName('SKILL_ENABLED'));
    }
}
