<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Psr\Http\Client;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

final class VarDumperClientDecorator implements ClientInterface
{
    /**
     * @var ClientInterface
     */
    private $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        dump((string) $request->getUri());

        $response = $this->client->sendRequest($request);

        dump((string) $response->getStatusCode());
        dump((string) $response->getBody());

        return $response;
    }
}
