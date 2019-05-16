<?php

declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\Manifest\Api\SmartHome;

use Omissis\AlexaSdk\Model\Exception;

final class InvalidProtocolVersionException extends Exception
{
    /**
     * @var string
     */
    private $invalidProtocolVersion;

    public function __construct(string $invalidProtocolVersion)
    {
        parent::__construct(sprintf(
            'Invalid namespace: "%s". Allowed values are: "%s".',
            $invalidProtocolVersion,
            implode('", "', ProtocolVersion::ALLOWED_PROTOCOL_VERSIONS)
        ));

        $this->invalidProtocolVersion = $invalidProtocolVersion;
    }

    public function getInvalidProtocolVersion(): string
    {
        return $this->invalidProtocolVersion;
    }
}
