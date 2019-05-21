<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\ManifestSchema\Manifest;

use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\PublishingInformation;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\PublishingInformation\DistributionCountry;
use PHPUnit\Framework\TestCase;

final class PublishingInformationTest extends TestCase
{
    public function test_it_exposes_accessors(): void
    {
        $locales = [
            'en-US' => new PublishingInformation\Locale(
                'Room Booking Skill', // name
                'This is a sample Alexa skill.',
                'This skill has Alexa for Business reservations features.',
                'https://smallUri.example.com/small1.png',
                'https://largeUri.example.com/large1.png',
                [
                    'Alexa, book this room.',
                    'Alexa, find a room at 3pm tomorrow.'
                ],
                [
                    'Meetings',
                    'Booking',
                    'Alexa For Business'
                ],
                'This skill has updates that fix feature bugs.'
            ),
        ];
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
