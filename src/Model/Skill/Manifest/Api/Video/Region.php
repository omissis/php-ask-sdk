<?php

declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\Manifest\Api\Video;

final class Region
{
    /**
     * @var Region\Endpoint
     */
    private $endpoint;

    /**
     * @var Region\UpChannel
     */
    private $upChannel;

    public function __construct(Region\Endpoint $endpoint, Region\UpChannel $upChannel)
    {
        $this->endpoint = $endpoint;
        $this->upChannel = $upChannel;
    }

    public function getEndpoint(): Region\Endpoint
    {
        return $this->endpoint;
    }

    public function getUpChannel(): Region\UpChannel
    {
        return $this->upChannel;
    }
}
