<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\Manifest\Api\Video\Region;

use Omissis\AlexaSdk\Model\Skill\Manifest\Api\Video\Region\Endpoint;
use Omissis\AlexaSdk\Model\Uri\Uri;
use PHPUnit\Framework\TestCase;

final class EndpointTest extends TestCase
{
    function test_it_exposes_accessors(): void
    {
        $uri = new Uri('arn:aws:lambda:us-east-1:452493640596:function:sampleSkill');
        $endpoint = new Endpoint($uri);

        $this->assertSame($uri, $endpoint->getUri());
    }
}
