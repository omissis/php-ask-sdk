<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\Manifest\Api\Custom;

use Omissis\AlexaSdk\Model\Skill\Manifest\Api\Custom\Endpoint;
use Omissis\AlexaSdk\Model\Skill\Manifest\Api\Custom\Region;
use Omissis\AlexaSdk\Model\Ssl\SslCertificateType;
use Omissis\AlexaSdk\Model\Uri\Uri;
use PHPUnit\Framework\TestCase;

final class RegionTest extends TestCase
{
    function test_it_exposes_accessors(): void
    {
        $endpoint = new Endpoint(new Uri('https://api.example.com/eu'), new SslCertificateType('SelfSigned'));
        $region = new Region($endpoint);

        $this->assertSame($endpoint, $region->getEndpoint());
    }
}
