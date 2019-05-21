<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\Health;

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
