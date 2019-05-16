<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\Manifest;

use Omissis\AlexaSdk\Model\Skill\Manifest\ManifestVersion;
use PHPUnit\Framework\TestCase;

final class ManifestVersionTest extends TestCase
{
    public function test_it_is_convertible_to_string(): void
    {
        $this->assertSame('1234.5678', (string) new ManifestVersion('1234.5678'));
    }
}
