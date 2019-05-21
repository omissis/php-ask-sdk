<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\ManifestSchema\Manifest;

use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\ManifestVersion;
use PHPUnit\Framework\TestCase;

final class ManifestVersionTest extends TestCase
{
    public function testItIsConvertibleToString(): void
    {
        $this->assertSame('1234.5678', (string) new ManifestVersion('1234.5678'));
    }
}
