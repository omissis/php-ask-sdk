<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\Manifest\Api;

use Omissis\AlexaSdk\Model\Skill\Manifest\Api\AlexaForBusiness;
use Omissis\AlexaSdk\Model\Uri\Uri;
use PHPUnit\Framework\TestCase;

final class AlexaForBusinessTest extends TestCase
{
    function test_it_exposes_accessors(): void
    {
        $endpoint = new AlexaForBusiness\Endpoint(new Uri('arn:aws:lambda:us-east-1:123456789:function:myFunctionName1'));
        $regions = [
            'NA' => new AlexaForBusiness\Region(new AlexaForBusiness\Region\Endpoint(new Uri('https:://example.com/custom')))
        ];
        $interfaces = [
            new AlexaForBusiness\SupportedInterface(
                new AlexaForBusiness\SupportedInterface\InterfaceNamespace('Alexa.Business.Reservation.Room'),
                new AlexaForBusiness\SupportedInterface\Version('1.0'),
                [new AlexaForBusiness\SupportedInterface\Request('Search')]
            )
        ];
        $alexaForBusiness = new AlexaForBusiness($endpoint, $regions, $interfaces);

        $this->assertSame($endpoint, $alexaForBusiness->getEndpoint());
        $this->assertSame($regions, $alexaForBusiness->getRegions());
        $this->assertSame($interfaces, $alexaForBusiness->getInterfaces());
    }
}
