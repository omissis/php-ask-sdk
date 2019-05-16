<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\Manifest\Api\Video\Locale;

use Omissis\AlexaSdk\Model\Skill\Manifest\Api\Video\Locale\CatalogInformation;
use PHPUnit\Framework\TestCase;

final class CatalogInformationTest extends TestCase
{
    public function test_it_exposes_accessors(): void
    {
        $catalogInformation = new CatalogInformation('1234', 'FIRE_TV');

        $this->assertSame('1234', $catalogInformation->getSourceId());
        $this->assertSame('FIRE_TV', $catalogInformation->getType());
    }
}
