<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\ManifestSchema;

use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Events;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\ManifestVersion;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Permission;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\PrivacyAndCompliance;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\PublishingInformation;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\UnsupportedApiException;

/*final */class Manifest
{
    /**
     * Object specifying required information for all interfaces that a skill supports.
     *
     * @var Api[]
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
     * @var null|ManifestVersion
     */
    private $manifestVersion;

    /**
     * Array specifying the permissions that let you ask the user for specific personal information, such as access to the address of their device.
     *
     * @var null|Permission[]
     */
    private $permissions;

    /**
     * Object containing options related to user privacy, such as the URLs for your privacy policy and terms of use.
     *
     * @var null|PrivacyAndCompliance
     */
    private $privacyAndCompliance;

    /**
     * Object containing the information to determine how the skill is presented to end users in the skill store or Alexa app.
     *
     * @var null|PublishingInformation
     */
    private $publishingInformation;

    /**
     * @param Api[] $apis
     * @param null|Permission[] $permissions
     *
     * @throws UnsupportedApiException
     */
    public function __construct(
        array $apis,
        ?Events $events = null,
        ?ManifestVersion $manifestVersion = null,
        ?array $permissions = null,
        ?PrivacyAndCompliance $privacyAndCompliance = null,
        ?PublishingInformation $publishingInformation = null
    ) {
        foreach (array_keys($apis) as $name) {
            if (!in_array($name, Api::ALLOWED_API_NAMES, true)) {
                throw new UnsupportedApiException($name);
            }
        }

        $this->apis = $apis;
        $this->events = $events;
        $this->manifestVersion = $manifestVersion;
        $this->permissions = $permissions;
        $this->privacyAndCompliance = $privacyAndCompliance;
        $this->publishingInformation = $publishingInformation;
    }

    /**
     * @return Api[]
     */
    public function getApis(): array
    {
        return $this->apis;
    }

    public function getEvents(): ?Events
    {
        return $this->events;
    }

    public function getManifestVersion(): ?ManifestVersion
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

    public function getPrivacyAndCompliance(): ?PrivacyAndCompliance
    {
        return $this->privacyAndCompliance;
    }

    public function getPublishingInformation(): ?PublishingInformation
    {
        return $this->publishingInformation;
    }
}
