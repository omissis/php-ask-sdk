<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\ManifestSchema\Manifest\Api\AlexaForBusiness\SupportedInterface;

use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\AlexaForBusiness\SupportedInterface\Version;
use PHPUnit\Framework\TestCase;

final class VersionTest extends TestCase
{
    public function testItIsConvertibleToString(): void
    {
        $this->assertSame('1.0', (string) new Version('1.0'));
    }
}
