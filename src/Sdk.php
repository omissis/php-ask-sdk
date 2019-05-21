<?php declare(strict_types=1);

namespace Omissis\AlexaSdk;

use Omissis\AlexaSdk\Model\Skill\InteractionModelSchema;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema;
use Omissis\AlexaSdk\Sdk\OAuthToken;
use Omissis\AlexaSdk\Serializer\Deserializer;
use Omissis\AlexaSdk\Serializer\Format;
use Omissis\AlexaSdk\Serializer\Serializer;
use Omissis\AlexaSdk\Serializer\Type;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use RuntimeException;
use Throwable;

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
    public function getSkillInformation(string $skillId, string $stage): ManifestSchema
    {
        try {
            $response = $this->get("$this->baseUrl/skills/$skillId/stages/$stage/manifest");
        } catch (Throwable $exception) {
            throw new Sdk\Exception(sprintf('Cannot get skill "%s" information for stage "%s".', $skillId, $stage), 0, $exception);
        }

        return $this->deserializer->deserialize((string) $response->getBody(), Format::json(), Type::skillManifestSchema());
    }

    public function createSkill(): void
    {
        $this->serializer->serialize(['todo' => 'implement'], Format::json());
    }

    /**
     * @throws Sdk\Exception
     */
    public function getInteractionModel(string $skillId, string $stage, string $locale): InteractionModelSchema
    {
        try {
            $response = $this->get("$this->baseUrl/skills/$skillId/stages/$stage/interactionModel/locales/$locale");
        } catch (Throwable $exception) {
            throw new Sdk\Exception(sprintf('Cannot get skill "%s" information for stage "%s".', $skillId, $stage), 0, $exception);
        }

        return $this->deserializer->deserialize((string) $response->getBody(), Format::json(), Type::skillInteractionModelSchema());
    }

    /**
     * @throws RuntimeException
     * @throws ClientExceptionInterface
     */
    private function get(string $url): ResponseInterface
    {
        $request = $this->httpRequestFactory
            ->createRequest('GET', $url)
            ->withHeader('Authorization', sprintf('Bearer %s', $this->oAuthToken->getToken()))
            ->withHeader('Accept', 'application/json')
            ->withHeader('Content-Type', 'application/json');

        $response = $this->httpClient->sendRequest($request);

        $responseStatusCode = $response->getStatusCode();

        if ($responseStatusCode < 200 || $responseStatusCode > 299) {
            throw new RuntimeException(sprintf(
                'Request "%s" failed: status code %d received. Response body: %s',
                $url,
                $responseStatusCode,
                (string) $response->getBody()
            ));
        }

        return $response;
    }
}
