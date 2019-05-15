<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\Manifest\Api;

use Omissis\AlexaSdk\Model\Skill\Manifest\Api;
use Omissis\AlexaSdk\Model\Skill\Manifest\Api\Health\Endpoint;
use Omissis\AlexaSdk\Model\Skill\Manifest\Api\Health\Region;

final class Health implements Api
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
     * @var Region[]
     */
    private $regions;

    /**
     * @param Region[] $regions
     */
    public function __construct(Endpoint $endpoint, array $regions)
    {
        $this->endpoint = $endpoint;
        $this->regions = $regions;
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
}
