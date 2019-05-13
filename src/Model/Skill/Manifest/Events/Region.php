<?php

namespace Omissis\AlexaSdk\Model\Skill\Manifest\Events;

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
