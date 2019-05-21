<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\Manifest\Api\Video;

final class Region
{
    /**
     * @var Region\Endpoint
     */
    private $endpoint;

    /**
     * @var null|Region\Upchannel[]
     */
    private $upchannel;

    /**
     * @param null|Region\Upchannel[] $upchannel
     */
    public function __construct(Region\Endpoint $endpoint, ?array $upchannel = null)
    {
        $this->endpoint = $endpoint;
        $this->upchannel = $upchannel;
    }

    public function getEndpoint(): Region\Endpoint
    {
        return $this->endpoint;
    }

    /**
     * @return null|Region\Upchannel[]
     */
    public function getUpchannel(): ?array
    {
        return $this->upchannel;
    }
}
