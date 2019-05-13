<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\Manifest\Events;

use Omissis\AlexaSdk\Model\Skill\Manifest\Events\Endpoint;
use Omissis\AlexaSdk\Model\Skill\Manifest\Events\Region;
use Omissis\AlexaSdk\Model\Uri\Uri;
use PHPUnit\Framework\TestCase;

final class RegionTest extends TestCase
{
    function test_it_exposes_accessors(): void
    {
        $endpoint = new Endpoint(new Uri('https:://example.com/custom'));
        $region = new Region($endpoint);

        $this->assertSame($endpoint, $region->getEndpoint());
    }
}
