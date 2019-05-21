<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\ManifestSchema\Manifest\Api;

use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\SmartHome;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\SmartHome\Endpoint;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\SmartHome\ProtocolVersion;
use Omissis\AlexaSdk\Model\Uri\Uri;
use PHPUnit\Framework\TestCase;

final class SmartHomeTest extends TestCase
{
    public function testItExposesAccessors(): void
    {
        $endpoint = new Endpoint(new Uri('arn:aws:lambda:us-east-1:123456789:function:myFunctionName1'));
        $regions = [new SmartHome\Region(new Endpoint(new Uri('https://api.example.com/eu')))];
        $protocolVersion = new ProtocolVersion('3');

        $smartHome = new SmartHome($endpoint, $regions, $protocolVersion);

        $this->assertSame($endpoint, $smartHome->getEndpoint());
        $this->assertSame($regions, $smartHome->getRegions());
        $this->assertSame($protocolVersion, $smartHome->getProtocolVersion());
    }
}
