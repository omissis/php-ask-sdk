<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\ManifestSchema\Manifest;

use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\PublishingInformation;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\PublishingInformation\DistributionCountry;
use PHPUnit\Framework\TestCase;

final class PublishingInformationTest extends TestCase
{
    public function testItExposesAccessors(): void
    {
        $locales = ['en-US' => $this->prophesize(PublishingInformation\Locale::class)->reveal()];
        $distributionCountries = [new DistributionCountry('US'), new DistributionCountry('GB'), new DistributionCountry('DE')];
        $isAvailableWorldwide = false;
        $distributionMode = new PublishingInformation\DistributionMode('PUBLIC');
        $testingInstructions = '1) Say \'Alexa, hello world\'';
        $category = new PublishingInformation\Category('HEALTH_AND_FITNESS');

        $publishingInformation = new PublishingInformation(
            $locales,
            $distributionCountries,
            $isAvailableWorldwide,
            $distributionMode,
            $testingInstructions,
            $category
        );

        $this->assertSame($locales, $publishingInformation->getLocales());
        $this->assertSame($distributionCountries, $publishingInformation->getDistributionCountries());
        $this->assertFalse($publishingInformation->isAvailableWorldwide());
        $this->assertSame($distributionMode, $publishingInformation->getDistributionMode());
        $this->assertSame($testingInstructions, $publishingInformation->getTestingInstructions());
        $this->assertSame($category, $publishingInformation->getCategory());
    }
}
