<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests;

use Omissis\AlexaSdk\Sdk;
use Omissis\AlexaSdk\Model\Skill;
use Omissis\AlexaSdk\Model\Skill\Manifest;
use Omissis\AlexaSdk\Serializer\Deserializer;
use Omissis\AlexaSdk\Serializer\Serializer;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Prophecy\Prophecy\ObjectProphecy;

final class SdkTest extends TestCase
{
    private const TEST_SKILL_ID = 'amzn1.ask.skill.00000001-0002-0003-0004-000000000005';
    private const TEST_STAGE = 'development';
    private const TEST_API_BASE_URL = 'https://api.amazonalexa.com/v1';

    /**
     * @var ObjectProphecy<ClientInterface>
     */
    private $client;

    /**
     * @var ObjectProphecy<RequestFactoryInterface>
     */
    private $httpRequestFactory;

    /**
     * @var Serializer
     */
    private $serializer;

    /**
     * @var Deserializer
     */
    private $deserializer;

    /**
     * @var Sdk
     */
    private $sdk;

    function setUp(): void
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

    function test_it_can_get_skill_information(): void
    {
        $request = $this->prophesize(RequestInterface::class);
        $request->withHeader('Authorization', 'Bearer foobar')->willReturn($request);
        $response = $this->prophesize(ResponseInterface::class);

        $this->httpRequestFactory
            ->createRequest('GET', self::TEST_API_BASE_URL.'/skills/'.self::TEST_SKILL_ID.'/stages/'.self::TEST_STAGE.'/manifest')
            ->willReturn($request->reveal())
            ->shouldBeCalledOnce();

        $this->client
            ->sendRequest($request->reveal())
            ->willReturn($response->reveal())
            ->shouldBeCalledOnce();

        $skillId = new Skill\Id(self::TEST_SKILL_ID);
        $stage = new Skill\Stage(self::TEST_STAGE);

        $manifest = $this->sdk->getSkillInformation($skillId, $stage);

        $this->assertInstanceOf(Manifest::class, $manifest);
    }
}
