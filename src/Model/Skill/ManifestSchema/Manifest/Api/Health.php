<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api;

use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\Health\Endpoint;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\Health\Region;

/*final */class Health implements Api
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
     * @var null|Region[]
     */
    private $regions;

    /**
     * @param null|Region[] $regions
     */
    public function __construct(Endpoint $endpoint, ?array $regions = null)
    {
        $this->endpoint = $endpoint;
        $this->regions = $regions;
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
}
