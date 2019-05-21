<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\ManifestSchema\Manifest\Api\Video\Locale;

use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\Video\Locale\CatalogInformation;
use PHPUnit\Framework\TestCase;

final class CatalogInformationTest extends TestCase
{
    public function testItExposesAccessors(): void
    {
        $catalogInformation = new CatalogInformation('1234', 'FIRE_TV');

        $this->assertSame('1234', $catalogInformation->getSourceId());
        $this->assertSame('FIRE_TV', $catalogInformation->getType());
    }
}
