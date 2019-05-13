<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\Manifest\Api\AlexaForBusiness\SupportedInterface;

use Omissis\AlexaSdk\Model\Skill\Manifest\Api\AlexaForBusiness\SupportedInterface\Version;
use PHPUnit\Framework\TestCase;

final class VersionTest extends TestCase
{
    function test_it_is_convertible_to_string(): void
    {
        $this->assertSame('1.0', (string) new Version('1.0'));
    }
}
