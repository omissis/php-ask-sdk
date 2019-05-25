<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\SmartHome;

/*final */class ProtocolVersion
{
    public const ALLOWED_PROTOCOL_VERSIONS = ['2', '3'];

    /**
     * The Amazon Resource Name (ARN) of the Lambda function, or the HTTPS URL for a custom endpoint.
     *
     * @var string
     */
    private $protocolVersion;

    /**
     * @throws InvalidProtocolVersionException
     */
    public function __construct(string $protocolVersion)
    {
        if (!in_array($protocolVersion, self::ALLOWED_PROTOCOL_VERSIONS, true)) {
            throw new InvalidProtocolVersionException($protocolVersion);
        }

        $this->protocolVersion = $protocolVersion;
    }

    public function __toString(): string
    {
        return $this->protocolVersion;
    }
}
