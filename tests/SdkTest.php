<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests;

use Nyholm\Psr7\Factory\Psr17Factory;
use Omissis\AlexaSdk\Model\Skill\InteractionModelSchema;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema;
use Omissis\AlexaSdk\Sdk;
use Omissis\AlexaSdk\Serializer\Deserializer;
use Omissis\AlexaSdk\Serializer\Format;
use Omissis\AlexaSdk\Serializer\Serializer;
use Omissis\AlexaSdk\Serializer\Type;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Prophecy\Prophecy\ObjectProphecy;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;

// phpcs:disable ObjectCalisthenics.CodeAnalysis.OneObjectOperatorPerLine
final class SdkTest extends TestCase
{
    private const TEST_SKILL_ID = 'amzn1.ask.skill.00000001-0002-0003-0004-000000000005';
    private const TEST_STAGE = 'development';
    private const TEST_API_BASE_URL = 'https://api.amazonalexa.com/v1';
    private const TEST_LOCALE = 'en-US';

    /**
     * @var Psr17Factory
     */
    private $psr17Factory;

    /**
     * @var ObjectProphecy|ClientInterface
     */
    private $client;

    /**
     * @var ObjectProphecy|RequestFactoryInterface
     */
    private $httpRequestFactory;

    /**
     * @var ObjectProphecy|Serializer
     */
    private $serializer;

    /**
     * @var ObjectProphecy|Deserializer
     */
    private $deserializer;

    /**
     * @var Sdk
     */
    private $sdk;

    public function setUp(): void
    {
        $this->psr17Factory = new Psr17Factory();

        $this->client = $this->prophesize(ClientInterface::class);
        $this->httpRequestFactory = $this->prophesize(RequestFactoryInterface::class);
        $this->serializer = $this->prophesize(Serializer::class);
        $this->deserializer = $this->prophesize(Deserializer::class);

        $this->sdk = new Sdk(
            $this->client->reveal(),
            $this->httpRequestFactory->reveal(),
            $this->serializer->reveal(),
            $this->deserializer->reveal(),
            self::TEST_API_BASE_URL,
            new Sdk\OAuthToken('foobar', 'barbaz')
        );
    }

    public function testItCanGetAManifestSchema(): void
    {
        $uri = self::TEST_API_BASE_URL . '/skills/' . self::TEST_SKILL_ID . '/stages/' . self::TEST_STAGE . '/manifest';

        $expectedResult = new ManifestSchema();

        $request = $this->createRequest('GET', $uri);

        $this->httpRequestFactory
            ->createRequest('GET', $uri)
            ->willReturn($request)
            ->shouldBeCalledOnce();

        $this->client
            ->sendRequest($request)
            ->willReturn($this->psr17Factory->createResponse())
            ->shouldBeCalledOnce();

        $this->deserializer
            ->deserialize(Argument::any(), Format::json(), Type::skillManifestSchema())
            ->willReturn($expectedResult)
            ->shouldBeCalledOnce();

        $actualResult = $this->sdk->getManifestSchema(self::TEST_SKILL_ID, self::TEST_STAGE);

        $this->assertSame($expectedResult, $actualResult);
    }

    public function testItCanGetAnInteractionModelSchema(): void
    {
        $uri = self::TEST_API_BASE_URL . '/skills/' . self::TEST_SKILL_ID . '/stages/' . self::TEST_STAGE . '/interactionModel/locales/'. self::TEST_LOCALE;

        $expectedResult = $this->prophesize(InteractionModelSchema::class)->reveal();

        $request = $this->createRequest('GET', $uri);

        $this->httpRequestFactory
            ->createRequest('GET', $uri)
            ->willReturn($request)
            ->shouldBeCalledOnce();

        $this->client
            ->sendRequest($request)
            ->willReturn($this->psr17Factory->createResponse())
            ->shouldBeCalledOnce();

        $this->deserializer
            ->deserialize(Argument::any(), Format::json(), Type::skillInteractionModelSchema())
            ->willReturn($expectedResult)
            ->shouldBeCalledOnce();

        $actualResult = $this->sdk->getInteractionModelSchema(self::TEST_SKILL_ID, self::TEST_STAGE, self::TEST_LOCALE);

        $this->assertSame($expectedResult, $actualResult);
    }

    public function testItCanUpdateAnInteractionModelSchema(): void
    {
        $uri = self::TEST_API_BASE_URL . '/skills/' . self::TEST_SKILL_ID . '/stages/' . self::TEST_STAGE . '/interactionModel/locales/'. self::TEST_LOCALE;

        $expectedResult = '{"foo": "bar"}';

        $request = $this->createRequest('PUT', $uri);

        $this->httpRequestFactory
            ->createRequest('PUT', $uri)
            ->willReturn($request)
            ->shouldBeCalledOnce();

        $this->client
            ->sendRequest($request)
            ->willReturn($this->psr17Factory->createResponse())
            ->shouldBeCalledOnce();

        $this->serializer
            ->serialize(Argument::any(), Format::json())
            ->willReturn($expectedResult)
            ->shouldBeCalledOnce();

        $actualResult = $this->sdk->updateInteractionModelSchema(self::TEST_SKILL_ID, self::TEST_STAGE, self::TEST_LOCALE);

        $this->assertSame($expectedResult, $actualResult);
    }

    private function createRequest(string $method, string $uri): RequestInterface
    {
        return $this->psr17Factory->createRequest($method, $uri)
            ->withHeader('Accept', 'application/json')
            ->withHeader('Content-Type', 'application/json')
            ->withHeader('Authorization', 'Bearer foobar');
    }
}
