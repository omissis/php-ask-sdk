<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\Manifest\Api;

use Omissis\AlexaSdk\Model\Skill\Manifest\Api;
use Omissis\AlexaSdk\Model\Skill\Manifest\Api\SmartHome\Endpoint;
use Omissis\AlexaSdk\Model\Skill\Manifest\Api\SmartHome\ProtocolVersion;
use Omissis\AlexaSdk\Model\Skill\Manifest\Api\SmartHome\Region;

final class SmartHome implements Api
{
    /**
     * Contains the uri field.
     *
     * @var Endpoint
     */
    private $endpoint;

    /**
     * Contains an array of the supported <region> Objects
     *
     * @var array<Region>
     */
    private $regions;

    /**
     * (Optional) Version of the Smart Home API. Default and recommended value is '3'. You may create a skill with version '2' for testing migration to version '3', but a skill submission using version '2' will not be certified.
     *
     * @var null|ProtocolVersion
     */
    private $protocolVersion;

    /**
     * @param array<Region>
     */
    public function __construct(Endpoint $endpoint, array $regions, ?ProtocolVersion $protocolVersion = null)
    {
        $this->endpoint = $endpoint;
        $this->regions = $regions;
        $this->protocolVersion = $protocolVersion;
    }

    public function getEndpoint(): Endpoint
    {
        return $this->endpoint;
    }

    /**
     * @return array<Region>
     */
    public function getRegions(): array
    {
        return $this->regions;
    }

    public function getProtocolVersion(): ?ProtocolVersion
    {
        return $this->protocolVersion;
    }
}
