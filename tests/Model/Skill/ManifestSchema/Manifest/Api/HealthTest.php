<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\ManifestSchema\Manifest\Api;

use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\Health;
use Omissis\AlexaSdk\Model\Uri\Uri;
use PHPUnit\Framework\TestCase;

final class HealthTest extends TestCase
{
    public function testItExposesAccessors(): void
    {
        $endpoint = new Health\Endpoint(new Uri('arn:aws:lambda:us-east-1:123456789:function:myFunctionName1'));
        $regions = [new Health\Region(new Health\Region\Endpoint(new Uri('https://api.example.com/eu')))];

        $smartHome = new Health($endpoint, $regions);

        $this->assertSame($endpoint, $smartHome->getEndpoint());
        $this->assertSame($regions, $smartHome->getRegions());
    }
}
