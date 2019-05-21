<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\Manifest\Api;

use Omissis\AlexaSdk\Model\Skill\Manifest\Api;
use Omissis\AlexaSdk\Model\Skill\Manifest\Api\AlexaForBusiness\Endpoint;
use Omissis\AlexaSdk\Model\Skill\Manifest\Api\AlexaForBusiness\Region;
use Omissis\AlexaSdk\Model\Skill\Manifest\Api\AlexaForBusiness\SupportedInterface;

final class AlexaForBusiness implements Api
{
    /**
     * Contains the uri field. Sets the global default endpoint, which can be overridden on a region-by-region basis.
     *
     * @var Endpoint
     */
    private $endpoint;

    /**
     * Contains an array of the supported <region> Objects.
     *
     * @var null|Region[]
     */
    private $regions;

    /**
     * Contains an array of the supported interfaces
     *
     * @var null|SupportedInterface[]
     */
    private $interfaces;

    /**
     * @param null|Region[] $regions
     * @param null|SupportedInterface[] $interfaces
     */
    public function __construct(Endpoint $endpoint, ?array $regions = null, ?array $interfaces = null)
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
     * @return null|Region[]
     */
    public function getRegions(): ?array
    {
        return $this->regions;
    }

    /**
     * @return null|SupportedInterface[]
     */
    public function getInterfaces(): ?array
    {
        return $this->interfaces;
    }
}
