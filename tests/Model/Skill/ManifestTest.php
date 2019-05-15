<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill;

use Omissis\AlexaSdk\Model\Skill\Manifest;
use Omissis\AlexaSdk\Model\Skill\Manifest\Api\HouseholdList;
use Omissis\AlexaSdk\Model\Skill\Manifest\Events;
use Omissis\AlexaSdk\Model\Skill\Manifest\Events\EventName;
use Omissis\AlexaSdk\Model\Skill\Manifest\ManifestVersion;
use Omissis\AlexaSdk\Model\Skill\Manifest\Permission;
use Omissis\AlexaSdk\Model\Skill\Manifest\PrivacyAndCompliance;
use Omissis\AlexaSdk\Model\Skill\Manifest\PublishingInformation;
use Omissis\AlexaSdk\Model\Skill\Manifest\PublishingInformation\DistributionCountry;
use Omissis\AlexaSdk\Model\Ssl\SslCertificateType;
use Omissis\AlexaSdk\Model\Uri\Uri;
use Omissis\AlexaSdk\Model\Uri\Url;
use PHPUnit\Framework\TestCase;

final class ManifestTest extends TestCase
{
    function test_it_exposes_accessors(): void
    {
        $manifestVersion = new ManifestVersion('1234.5678');
        $locales = [
            'en-US' => new PublishingInformation\Locale(
                'Room Booking Skill',
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

        $locale = new PrivacyAndCompliance\Locale(
            new Url('https://example.com/privacy-policy'),
            new Url('https://example.com/terms-of-use')
        );
        $privacyAndCompliance = new PrivacyAndCompliance(true, false, true, false, true, ['en-US' => $locale]);

        $permissions = [new Permission('alexa::alerts:reminders:skill:readwrite')];

        $publications = [new Events\Publication(new EventName('SKILL_ENABLED'))];
        $subscriptions = [new Events\Subscription(new EventName('SKILL_ENABLED'))];
        $endpoint = new Events\Endpoint(new Uri('https://example.com/'));
        $regions = [new Events\Region(new Events\Endpoint(new Uri('https://example.com/EU')))];
        $sslCertificateType = new SslCertificateType('SelfSigned');

        $events = new Events(
            $endpoint,
            $publications,
            $subscriptions,
            $regions,
            $sslCertificateType
        );

        $apis = ['householdList' => new HouseholdList()];

        $manifest = new Manifest(
            $apis,
            $events,
            $manifestVersion,
            $permissions,
            $privacyAndCompliance,
            $publishingInformation
        );

        $this->assertSame($apis, $manifest->getApis());
        $this->assertSame($events, $manifest->getEvents());
        $this->assertSame($manifestVersion, $manifest->getManifestVersion());
        $this->assertSame($permissions, $manifest->getPermissions());
        $this->assertSame($privacyAndCompliance, $manifest->getPrivacyAndCompliance());
        $this->assertSame($publishingInformation, $manifest->getPublishingInformation());
    }
}
