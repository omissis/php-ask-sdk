<?php

namespace Omissis\AlexaSdk\Model\Skill;

use Omissis\AlexaSdk\Model\Skill\Manifest\Api;
use Omissis\AlexaSdk\Model\Skill\Manifest\Events;
use Omissis\AlexaSdk\Model\Skill\Manifest\Permission;
use Omissis\AlexaSdk\Model\Skill\Manifest\PrivacyAndCompliance;
use Omissis\AlexaSdk\Model\Skill\Manifest\PublishingInformation;
use Omissis\AlexaSdk\Model\Skill\Manifest\ManifestVersion;

/*final */class Manifest
{
    /**
     * Object specifying required information for all interfaces that a skill supports.
     *
     * @var array<string, Api>
     */
    private $apis;

    /**
     * Object specifying the events a skill wants to subscribe to. E.g. notify the skill whenever a customer enables or disables the skill.
     *
     * @var null|Events
     */
    private $events;

    /**
     * Version of the skill manifest.
     *
     * @var ManifestVersion
     */
    private $manifestVersion;

    /**
     * Array specifying the permissions that let you ask the user for specific personal information, such as access to the address of their device.
     *
     * @var null|(Permission[])
     */
    private $permissions;

    /**
     * Object containing options related to user privacy, such as the URLs for your privacy policy and terms of use.
     *
     * @var PrivacyAndCompliance
     */
    private $privacyAndCompliance;

    /**
     * Object containing the information to determine how the skill is presented to end users in the skill store or Alexa app.
     *
     * @var PublishingInformation
     */
    private $publishingInformation;

    /**
     * @param array<string, Api> $apis
     * @param Permission[] $permissions
     */
    public function __construct(
        array $apis,
        ?Events $events,
        ManifestVersion $manifestVersion,
        ?array $permissions,
        PrivacyAndCompliance $privacyAndCompliance,
        PublishingInformation $publishingInformation
    ) {
        $this->apis = $apis;
        $this->events = $events;
        $this->manifestVersion = $manifestVersion;
        $this->permissions = $permissions;
        $this->privacyAndCompliance = $privacyAndCompliance;
        $this->publishingInformation = $publishingInformation;
    }

    /**
     * @return array<string, Api>
     */
    public function getApis(): array
    {
        return $this->apis;
    }

    public function getEvents(): ?Events
    {
        return $this->events;
    }

    public function getManifestVersion(): ManifestVersion
    {
        return $this->manifestVersion;
    }

    /**
     * @return null|Permission[]
     */
    public function getPermissions(): ?array
    {
        return $this->permissions;
    }

    public function getPrivacyAndCompliance(): PrivacyAndCompliance
    {
        return $this->privacyAndCompliance;
    }

    public function getPublishingInformation(): PublishingInformation
    {
        return $this->publishingInformation;
    }
}
