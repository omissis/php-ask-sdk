<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill;

use Omissis\AlexaSdk\Model\Skill\ManifestSchema;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest;
use PHPUnit\Framework\TestCase;

final class ManifestSchemaTest extends TestCase
{
    public function testItExposesAccessors(): void
    {
        $manifest = $this->prophesize(Manifest::class)->reveal();
        $manifestSchema = new ManifestSchema($manifest);

        $this->assertSame($manifest, $manifestSchema->getManifest());
        $this->assertNull($manifestSchema->getSkillManifest());
        $this->assertNull($manifestSchema->getVendorId());
    }
}
