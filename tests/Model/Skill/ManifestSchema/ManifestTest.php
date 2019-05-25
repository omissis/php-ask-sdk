<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\ManifestSchema;

use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\HouseholdList;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Events;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\ManifestVersion;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Permission;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\PrivacyAndCompliance;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\PublishingInformation;
use PHPUnit\Framework\TestCase;

final class ManifestTest extends TestCase
{
    public function testItExposesAccessors(): void
    {
        $apis = ['householdList' => new HouseholdList()];
        $events = $this->prophesize(Events::class)->reveal();
        $manifestVersion = new ManifestVersion('1234.5678');
        $permissions = [new Permission('alexa::alerts:reminders:skill:readwrite')];
        $privacyAndCompliance = $this->prophesize(PrivacyAndCompliance::class)->reveal();
        $publishingInformation = $this->prophesize(PublishingInformation::class)->reveal();

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
