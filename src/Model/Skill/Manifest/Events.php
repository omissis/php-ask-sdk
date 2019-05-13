<?php

namespace Omissis\AlexaSdk\Model\Skill\Manifest;

use Omissis\AlexaSdk\Model\Skill\Manifest\Events\Endpoint;
use Omissis\AlexaSdk\Model\Skill\Manifest\Events\EventName;
use Omissis\AlexaSdk\Model\Skill\Manifest\Events\Region;
use Omissis\AlexaSdk\Model\Ssl\SslCertificateType;

final class Events
{
    /**
     * Contains an array of eventName objects, each of which contains the name of a proactive event.
     *
     * @var array<EventName>
     */
    private $publications;

    /**
     * Contains an array of eventName objects, each of which contains the name of a skill event.
     *
     * @var array<EventName>
     */
    private $subscriptions;

    /**
     * Contains the uri field. This sets the global default endpoint for events.
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
     * The SSL certificate type for the skill's HTTPS endpoint. Only valid for HTTPS endpoints, not for AWS Lambda ARN. See sslCertificateType enumeration.
     *
     * @var SslCertificateType
     */
    private $sslCertificateType;

    /**
     * @param array<EventName> $publications
     * @param array<EventName> $subscriptions
     * @param array<Region> $regions
     */
    public function __construct(
        array $publications,
        array $subscriptions,
        Endpoint $endpoint,
        array $regions,
        SslCertificateType $sslCertificateType
    ) {
        $this->publications = $publications;
        $this->subscriptions = $subscriptions;
        $this->endpoint = $endpoint;
        $this->regions = $regions;
        $this->sslCertificateType = $sslCertificateType;
    }

    /**
     * @return array<EventName>
     */
    public function getPublications(): array
    {
        return $this->publications;
    }

    /**
     * @return array<EventName>
     */
    public function getSubscriptions(): array
    {
        return $this->subscriptions;
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

    public function getSslCertificateType(): SslCertificateType
    {
        return $this->sslCertificateType;
    }
}
