<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\Manifest\Api\Video;

final class Region
{
    /**
     * @var Region\Endpoint
     */
    private $endpoint;

    /**
     * @var Region\Upchannel[]
     */
    private $upchannel;

    public function __construct(Region\Endpoint $endpoint, Region\Upchannel $upchannel)
    {
        $this->endpoint = $endpoint;
        $this->upchannel = [$upchannel];
    }

    public function getEndpoint(): Region\Endpoint
    {
        return $this->endpoint;
    }

    /**
     * @return Region\Upchannel[]
     */
    public function getUpchannel(): array
    {
        return $this->upchannel;
    }
}
