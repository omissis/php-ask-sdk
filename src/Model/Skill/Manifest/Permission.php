<?php

namespace Omissis\AlexaSdk\Model\Skill\Manifest;

final class Permission
{
    public const ALLOWED_PERMISSIONS = [
        'alexa::alerts:reminders:skill:readwrite', // Read/write permission for reminder alerts.
        'alexa:devices:all:address:country_and_postal_code:read', // Read the customer's country or region and postal code.
        'alexa::devices:all:geolocation:read', // Read permission for location services.
        'alexa::devices:all:address:full:read', // Read the customer's full address.
        'alexa::devices:all:notifications:write', // Write to the customer's Alexa notifications.
        'alexa::household:lists:read', // Read the customer's Alexa lists.
        'alexa::household:lists:write', // Write to the customer's Alexa lists.
        'alexa::profile:email:read', // Read the customer's email address.
        'alexa::profile:given_name:read', // Read the customer's given name or first name.
        'alexa::profile:mobile_number:read', // Read the customer's phone number.
        'alexa::profile:name:read', // Read the customer's full name.
    ];

    /**
     * @var string
     */
    private $permission;

    /**
     * @throws InvalidPermissionException
     */
    public function __construct(string $permission)
    {
        if (!in_array($permission, self::ALLOWED_PERMISSIONS, true)) {
            throw new InvalidPermissionException($permission);
        }

        $this->permission = $permission;
    }

    public function __toString()
    {
        return $this->permission;
    }
}
