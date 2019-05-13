<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\Manifest\Api\Video;

use Omissis\AlexaSdk\Model\Skill\Manifest\Api\Video\Region;
use Omissis\AlexaSdk\Model\Skill\Manifest\Api\Video\Region\Endpoint;
use Omissis\AlexaSdk\Model\Skill\Manifest\Api\Video\Region\UpChannel;
use Omissis\AlexaSdk\Model\Uri\Uri;
use PHPUnit\Framework\TestCase;

final class RegionTest extends TestCase
{
    function test_it_exposes_accessors(): void
    {
        $endpoint = new Endpoint(new Uri('arn:aws:lambda:us-east-1:452493640596:function:sampleSkill'));
        $upChannel = new UpChannel(new UpChannel\Type('SNS'), new Uri('arn:aws:sns:us-east-1:291420629295:sampleSkill'));
        $region = new Region($endpoint, $upChannel);

        $this->assertSame($endpoint, $region->getEndpoint());
        $this->assertSame($upChannel, $region->getUpChannel());
    }
}
