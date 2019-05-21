<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\AlexaForBusiness;

use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\AlexaForBusiness\SupportedInterface\InterfaceNamespace;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\AlexaForBusiness\SupportedInterface\Request;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\AlexaForBusiness\SupportedInterface\Version;

final class SupportedInterface
{
    /**
     * Must be Alexa.Business.Reservation.Room.
     *
     * @var InterfaceNamespace
     */
    private $namespace;

    /**
     * Version of the object.
     *
     * @var null|Version
     */
    private $version;

    /**
     * Array of requests.
     *
     * @var null|Request[]
     */
    private $requests;

    /**
     * @param null|Request[] $requests
     */
    public function __construct(InterfaceNamespace $namespace, ?Version $version = null, ?array $requests = null)
    {
        $this->namespace = $namespace;
        $this->version = $version;
        $this->requests = $requests;
    }

    public function getNamespace(): InterfaceNamespace
    {
        return $this->namespace;
    }

    public function getVersion(): ?Version
    {
        return $this->version;
    }

    /**
     * @return Request[]
     */
    public function getRequests(): ?array
    {
        return $this->requests;
    }
}
