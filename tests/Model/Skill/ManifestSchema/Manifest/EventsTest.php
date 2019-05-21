<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\ManifestSchema\Manifest;

use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Events;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Events\EventName;
use Omissis\AlexaSdk\Model\Ssl\SslCertificateType;
use Omissis\AlexaSdk\Model\Uri\Uri;
use PHPUnit\Framework\TestCase;

final class EventsTest extends TestCase
{
    public function test_it_exposes_accessors(): void
    {
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

        $this->assertSame($publications, $events->getPublications());
        $this->assertSame($subscriptions, $events->getSubscriptions());
        $this->assertSame($endpoint, $events->getEndpoint());
        $this->assertSame($regions, $events->getRegions());
        $this->assertSame($sslCertificateType, $events->getSslCertificateType());
    }
}
