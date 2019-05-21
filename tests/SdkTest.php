<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests;

use Nyholm\Psr7\Factory\Psr17Factory;
use Omissis\AlexaSdk\Model\Skill;
use Omissis\AlexaSdk\Model\SkillManifestSchema;
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

final class SdkTest extends TestCase
{
    private const TEST_SKILL_ID = 'amzn1.ask.skill.00000001-0002-0003-0004-000000000005';
    private const TEST_STAGE = 'development';
    private const TEST_API_BASE_URL = 'https://api.amazonalexa.com/v1';

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

    public function test_it_can_get_skill_information(): void
    {
        $uri = self::TEST_API_BASE_URL . '/skills/' . self::TEST_SKILL_ID . '/stages/' . self::TEST_STAGE . '/manifest';

        $factory = new Psr17Factory();

        $request = $factory->createRequest('GET', $uri)
            ->withHeader('Accept', 'application/json')
            ->withHeader('Content-Type', 'application/json')
            ->withHeader('Authorization', 'Bearer foobar');

        $response = $factory->createResponse();

        $this->httpRequestFactory
            ->createRequest('GET', $uri)
            ->willReturn($request)
            ->shouldBeCalledOnce();

        $this->client
            ->sendRequest($request)
            ->willReturn($response)
            ->shouldBeCalledOnce();

        $this->deserializer
            ->deserialize(Argument::any(), Format::json(), Type::skillManifestSchema())
            ->willReturn(new SkillManifestSchema());

        $skillId = new Skill\Id(self::TEST_SKILL_ID);
        $stage = new Skill\Stage(self::TEST_STAGE);

        $this->sdk->getSkillInformation($skillId, $stage);
    }
}
