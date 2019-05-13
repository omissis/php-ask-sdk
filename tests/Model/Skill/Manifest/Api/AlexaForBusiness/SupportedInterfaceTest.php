<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\Manifest\Api\AlexaForBusiness;

use Omissis\AlexaSdk\Model\Skill\Manifest\Api\AlexaForBusiness\SupportedInterface;
use Omissis\AlexaSdk\Model\Skill\Manifest\Api\AlexaForBusiness\SupportedInterface\InterfaceNamespace;
use Omissis\AlexaSdk\Model\Skill\Manifest\Api\AlexaForBusiness\SupportedInterface\Request;
use Omissis\AlexaSdk\Model\Skill\Manifest\Api\AlexaForBusiness\SupportedInterface\Version;
use PHPUnit\Framework\TestCase;

final class SupportedInterfaceTest extends TestCase
{
    function test_it_exposes_accessors(): void
    {
        $namespace = new InterfaceNamespace('Alexa.Business.Reservation.Room');
        $version = new Version('1.0');
        $requests = [new Request('Search')];

        $supportedInterface = new SupportedInterface($namespace, $version, $requests);

        $this->assertSame($namespace, $supportedInterface->getNamespace());
        $this->assertSame($version, $supportedInterface->getVersion());
        $this->assertSame($requests, $supportedInterface->getRequests());
    }
}
