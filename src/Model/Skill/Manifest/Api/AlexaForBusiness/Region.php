<?php

namespace Omissis\AlexaSdk\Model\Skill\Manifest\Api\AlexaForBusiness;

final class Region
{
    /**
     * @var Region\Endpoint
     */
    private $endpoint;

    public function __construct(Region\Endpoint $endpoint)
    {
        $this->endpoint = $endpoint;
    }

    public function getEndpoint(): Region\Endpoint
    {
        return $this->endpoint;
    }
}
