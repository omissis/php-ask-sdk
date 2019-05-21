<?php declare(strict_types=1);

namespace Omissis\AlexaSdk;

use Omissis\AlexaSdk\Model\Skill;
use Omissis\AlexaSdk\Model\SkillManifestSchema;
use Omissis\AlexaSdk\Sdk\OAuthToken;
use Omissis\AlexaSdk\Serializer\Deserializer;
use Omissis\AlexaSdk\Serializer\Format;
use Omissis\AlexaSdk\Serializer\Serializer;
use Omissis\AlexaSdk\Serializer\Type;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;

final class Sdk
{
    /**
     * @var ClientInterface
     */
    private $httpClient;

    /**
     * @var RequestFactoryInterface
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
     * @var string
     */
    private $baseUrl;

    /**
     * @var OAuthToken
     */
    private $oAuthToken;

    public function __construct(
        ClientInterface $client,
        RequestFactoryInterface $httpRequestFactory,
        Serializer $serializer,
        Deserializer $deserializer,
        string $baseUrl,
        OAuthToken $oAuthToken
    ) {
        $this->httpClient = $client;
        $this->httpRequestFactory = $httpRequestFactory;
        $this->serializer = $serializer;
        $this->deserializer = $deserializer;
        $this->baseUrl = $baseUrl;
        $this->oAuthToken = $oAuthToken;
    }

    /**
     * @throws Sdk\Exception
     */
    public function getSkillInformation(Skill\Id $skillId, Skill\Stage $stage): SkillManifestSchema
    {
        $request = $this->httpRequestFactory
            ->createRequest('GET', "$this->baseUrl/skills/$skillId/stages/$stage/manifest")
            ->withHeader('Authorization', sprintf('Bearer %s', $this->oAuthToken->getToken()))
            ->withHeader('Accept', 'application/json')
            ->withHeader('Content-Type', 'application/json');

        try {
            $response = $this->httpClient->sendRequest($request);

            if ($response->getStatusCode() < 200 || $response->getStatusCode() > 299) {
                throw new Sdk\Exception(sprintf('Request "%s" failed, Http code %d received.', (string) $request->getUri(), $response->getStatusCode()));
            }
        } catch (ClientExceptionInterface $e) {
            throw new Sdk\Exception(sprintf('Cannot get skill "%s" information for stage "%s".', $skillId, $stage), 0, $e);
        }

        return $this->deserializer->deserialize((string) $response->getBody(), Format::json(), Type::skillManifestSchema());
    }

    public function createSkill(): void
    {
        $this->serializer->serialize('{"todo": "implement"}', Format::json());
    }
}
