<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\Manifest;

use Omissis\AlexaSdk\Model\Skill\Manifest\Events\Endpoint;
use Omissis\AlexaSdk\Model\Skill\Manifest\Events\Publication;
use Omissis\AlexaSdk\Model\Skill\Manifest\Events\Region;
use Omissis\AlexaSdk\Model\Skill\Manifest\Events\Subscription;
use Omissis\AlexaSdk\Model\Ssl\SslCertificateType;

final class Events
{
    /**
     * Contains the uri field. This sets the global default endpoint for events.
     *
     * @var Endpoint
     */
    private $endpoint;

    /**
     * Contains an array of eventName objects, each of which contains the name of a proactive event.
     *
     * @var null|(Publication[])
     */
    private $publications;

    /**
     * Contains an array of eventName objects, each of which contains the name of a skill event.
     *
     * @var null|(Subscription[])
     */
    private $subscriptions;

    /**
     * Contains an array of the supported <region> Objects
     *
     * @var Region[]
     */
    private $regions;

    /**
     * The SSL certificate type for the skill's HTTPS endpoint. Only valid for HTTPS endpoints, not for AWS Lambda ARN. See sslCertificateType enumeration.
     *
     * @var null|SslCertificateType
     */
    private $sslCertificateType;

    /**
     * @param null|(Publication[]) $publications
     * @param null|(Subscription[]) $subscriptions
     * @param Region[] $regions
     */
    public function __construct(
        Endpoint $endpoint,
        ?array $publications,
        ?array $subscriptions,
        array $regions,
        ?SslCertificateType $sslCertificateType = null
    ) {
        $this->endpoint = $endpoint;
        $this->publications = $publications;
        $this->subscriptions = $subscriptions;
        $this->regions = $regions;
        $this->sslCertificateType = $sslCertificateType;
    }

    public function getEndpoint(): Endpoint
    {
        return $this->endpoint;
    }

    /**
     * @return null|Publication[]
     */
    public function getPublications(): ?array
    {
        return $this->publications;
    }

    /**
     * @return null|Subscription[]
     */
    public function getSubscriptions(): ?array
    {
        return $this->subscriptions;
    }

    /**
     * @return Region[]
     */
    public function getRegions(): array
    {
        return $this->regions;
    }

    public function getSslCertificateType(): ?SslCertificateType
    {
        return $this->sslCertificateType;
    }
}
