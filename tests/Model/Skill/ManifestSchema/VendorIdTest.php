<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\ManifestSchema;

use Omissis\AlexaSdk\Model\Skill\ManifestSchema\VendorId;
use PHPUnit\Framework\TestCase;

final class VendorIdTest extends TestCase
{
    public function testItIsConvertibleToString(): void
    {
        $this->assertSame('your-vendor-id', (string) new VendorId('your-vendor-id'));
    }
}
