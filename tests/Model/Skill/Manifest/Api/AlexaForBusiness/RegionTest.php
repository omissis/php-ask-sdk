<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\Manifest\Api\AlexaForBusiness;

use Omissis\AlexaSdk\Model\Skill\Manifest\Api\AlexaForBusiness\Endpoint;
use Omissis\AlexaSdk\Model\Skill\Manifest\Api\AlexaForBusiness\Region;
use Omissis\AlexaSdk\Model\Uri\Uri;
use PHPUnit\Framework\TestCase;

final class RegionTest extends TestCase
{
    function test_it_exposes_accessors(): void
    {
        $endpoint = new Endpoint(new Uri('arn:aws:lambda:us-east-1:12345678π9:function:myFunctionName1'));
        $region = new Region($endpoint);

        $this->assertSame($endpoint, $region->getEndpoint());
    }
}
