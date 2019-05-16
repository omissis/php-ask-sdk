<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\Manifest\Api;

use Omissis\AlexaSdk\Model\Skill\Manifest\Api\Custom;
use Omissis\AlexaSdk\Model\Ssl\SslCertificateType;
use Omissis\AlexaSdk\Model\Uri\Uri;
use PHPUnit\Framework\TestCase;

final class CustomTest extends TestCase
{
    public function test_it_exposes_accessors(): void
    {
        $endpoint = new Custom\Endpoint(
            new Uri('arn:aws:lambda:us-east-1:123456789:function:myFunctionName1'),
            new SslCertificateType('SelfSigned')
        );
        $regions = [
            new Custom\Region(new Custom\Endpoint(new Uri('https:://example.com/custom'), new SslCertificateType('SelfSigned')))
        ];
        $interfaces = [
            new Custom\SupportedInterface('AUDIO_PLAYER'),
        ];

        $custom = new Custom($endpoint, $regions, $interfaces);

        $this->assertSame($endpoint, $custom->getEndpoint());
        $this->assertSame($regions, $custom->getRegions());
        $this->assertSame($interfaces, $custom->getInterfaces());
    }
}
