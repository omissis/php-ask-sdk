<?php declare(strict_types=1);

namespace Omissis\AlexaSdk;

use Nyholm\Psr7\Stream;
use Omissis\AlexaSdk\Model\Skill\InteractionModelSchema;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema;
use Omissis\AlexaSdk\Model\Skill\UpdateInteractionModelSchema;
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
    public function getManifestSchema(string $skillId, string $stage): ManifestSchema
    {
        return $this->get(
            "$this->baseUrl/skills/$skillId/stages/$stage/manifest",
            "Cannot get manifest of skill '$skillId' for stage '$stage'",
            Type::skillManifestSchema()
        );
    }

    /**
     * @throws Sdk\Exception
     */
    public function getInteractionModelSchema(string $skillId, string $stage, string $locale): InteractionModelSchema
    {
        return $this->get(
            "$this->baseUrl/skills/$skillId/stages/$stage/interactionModel/locales/$locale",
            "Cannot get interaction model of skill '$skillId' for stage '$stage' using locale '$locale'.",
            Type::skillInteractionModelSchema()
        );
    }

    /**
     * @todo better specify return type
     *
     * @return mixed
     *
     * @throws Sdk\Exception
     */
    public function updateInteractionModelSchema(
        string $skillId,
        string $stage,
        string $locale,
        UpdateInteractionModelSchema $interactionModel
    ) {
        return $this->put(
            "$this->baseUrl/skills/$skillId/stages/$stage/interactionModel/locales/$locale",
            "Cannot update interaction model of skill '$skillId' for stage '$stage' using locale '$locale'.",
            $this->serializer->serialize($interactionModel, Format::json())
        );
    }

    /**
     * @return mixed
     *
     * @throws Sdk\Exception
     */
    private function put(string $url, string $errorMessage, string $body)
    {
        try {
            $response = $this->request('PUT', $url, $body);
        } catch (Throwable $exception) {
            throw new Sdk\Exception($errorMessage, 0, $exception);
        }

        return $response;
    }

    /**
     * @return mixed
     *
     * @throws Sdk\Exception
     */
    private function get(string $url, string $errorMessage, Type $returnType)
    {
        try {
            $response = $this->request('GET', $url);
        } catch (Throwable $exception) {
            throw new Sdk\Exception($errorMessage, 0, $exception);
        }

        return $this->deserializer->deserialize((string) $response->getBody(), Format::json(), $returnType);
    }

    /**
     * @throws RuntimeException
     * @throws ClientExceptionInterface
     */
    private function request(string $method, string $url, ?string $body = null): ResponseInterface
    {
        $request = $this->httpRequestFactory
            ->createRequest($method, $url)
            ->withHeader('Authorization', sprintf('Bearer %s', $this->oAuthToken->getToken()))
            ->withHeader('Accept', 'application/json')
            ->withHeader('Content-Type', 'application/json');

        if ($body !== null) {
            $request = $request->withBody(Stream::create($body));
        }

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
