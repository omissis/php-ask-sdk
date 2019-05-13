<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\Manifest\Api\Custom;

use Omissis\AlexaSdk\Model\Skill\Manifest\Api\Custom\InvalidNamespaceTypeException;
use Omissis\AlexaSdk\Model\Skill\Manifest\Api\Custom\SupportedInterface;
use PHPUnit\Framework\TestCase;

final class SupportedInterfaceTest extends TestCase
{
    function test_it_is_not_initializable_using_invalid_type(): void
    {
        $this->expectException(InvalidNamespaceTypeException::class);

        new SupportedInterface('FOO_BAR');
    }

    /**
     * @dataProvider typeProvider
     */
    function test_it_exposes_accessors(string $type): void
    {
        $supportedInterface = new SupportedInterface($type);

        $this->assertSame($type, $supportedInterface->getType());
    }

    public function typeProvider(): \Generator
    {
        yield ['ALEXA_PRESENTATION_APL'];
        yield ['AUDIO_PLAYER'];
        yield ['CAN_FULFILL_INTENT_REQUEST'];
        yield ['GADGET_CONTROLLER'];
        yield ['GAME_ENGINE'];
        yield ['RENDER_TEMPLATE'];
        yield ['VIDEO_APP'];
    }
}
