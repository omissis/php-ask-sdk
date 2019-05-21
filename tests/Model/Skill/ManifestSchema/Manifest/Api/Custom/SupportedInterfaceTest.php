<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\ManifestSchema\Manifest\Api\Custom;

use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\Custom\InvalidNamespaceTypeException;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\Custom\SupportedInterface;
use PHPUnit\Framework\TestCase;

final class SupportedInterfaceTest extends TestCase
{
    public function testItIsNotInitializableUsingInvalidType(): void
    {
        $this->expectException(InvalidNamespaceTypeException::class);

        new SupportedInterface('FOO_BAR');
    }

    /**
     * @dataProvider typeProvider
     */
    public function testItExposesAccessors(string $type): void
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
