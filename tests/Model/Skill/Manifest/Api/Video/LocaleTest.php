<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\Manifest\Api\Video;

use Omissis\AlexaSdk\Model\Skill\Manifest\Api\Video\Locale;
use Omissis\AlexaSdk\Model\Skill\Manifest\Api\Video\Locale\CatalogInformation;
use PHPUnit\Framework\TestCase;

final class LocaleTest extends TestCase
{
    function test_it_exposes_accessors(): void
    {
        $videoProviderTargetingName = new Locale\VideoProviderTargetingName('TV provider');
        $catalogInformation = new CatalogInformation('1234', 'FIRE_TV');
        $locale = new Locale(['IT' => $videoProviderTargetingName], [$catalogInformation]);

        $this->assertSame(['IT' => $videoProviderTargetingName], $locale->getVideoProviderTargetingNames());
        $this->assertSame([$catalogInformation], $locale->getCatalogInformation());
    }
}
