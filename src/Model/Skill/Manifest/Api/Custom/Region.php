<?php

namespace Omissis\AlexaSdk\Model\Skill\Manifest\Api\Custom;

final class Region
{
    /**
     * @var Endpoint
     */
    private $endpoint;

    public function __construct(Endpoint $endpoint)
    {
        $this->endpoint = $endpoint;
    }

    public function getEndpoint(): Endpoint
    {
        return $this->endpoint;
    }
}
