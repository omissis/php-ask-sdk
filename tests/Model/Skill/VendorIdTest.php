<?php

declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill;

use Omissis\AlexaSdk\Model\Skill\VendorId;
use PHPUnit\Framework\TestCase;

final class VendorIdTest extends TestCase
{
    function test_it_is_convertible_to_string(): void
    {
        $this->assertSame('your-vendor-id', (string) new VendorId('your-vendor-id'));
    }
}
