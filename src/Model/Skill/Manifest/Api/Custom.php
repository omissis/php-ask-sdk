<?php

namespace Omissis\AlexaSdk\Model\Skill\Manifest\Api;

use Omissis\AlexaSdk\Model\Skill\Manifest\Api;
use Omissis\AlexaSdk\Model\Skill\Manifest\Api\Custom\Endpoint;
use Omissis\AlexaSdk\Model\Skill\Manifest\Api\Custom\Region;
use Omissis\AlexaSdk\Model\Skill\Manifest\Api\Custom\SupportedInterface;

final class Custom implements Api
{
    /**
     * Contains the uri and sslCertificateType fields. Sets the global default endpoint, which can be overridden on a region-by-region basis.
     *
     * @var Endpoint
     */
    private $endpoint;

    /**
     * Contains an array of the supported <region> Objects.
     *
     * @var Region[]
     */
    private $regions;

    /**
     * Contains an array of the supported interfaces.
     *
     * @var SupportedInterface[]
     */
    private $interfaces;

    /**
     * @param Region[] $regions
     * @param SupportedInterface[] $interfaces
     */
    public function __construct(Endpoint $endpoint, array $regions, array $interfaces)
    {
        $this->endpoint = $endpoint;
        $this->regions = $regions;
        $this->interfaces = $interfaces;
    }

    public function getEndpoint(): Endpoint
    {
        return $this->endpoint;
    }

    /**
     * @return Region[]
     */
    public function getRegions(): array
    {
        return $this->regions;
    }

    /**
     * @return SupportedInterface[]
     */
    public function getInterfaces(): array
    {
        return $this->interfaces;
    }
}
