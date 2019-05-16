<?php

namespace Omissis\AlexaSdk\Model\Skill\Manifest\Api\AlexaForBusiness\SupportedInterface;

final class InterfaceNamespace
{
    public const ALLOWED_NAMESPACES = ['Alexa.Business.Reservation.Room'];

    /**
     * @var string
     */
    private $interfaceNamespace;

    /**
     * @throws InvalidNamespaceException
     */
    public function __construct(string $interfaceNamespace)
    {
        if (!in_array($interfaceNamespace, self::ALLOWED_NAMESPACES, true)) {
            throw new InvalidNamespaceException($interfaceNamespace);
        }

        $this->interfaceNamespace = $interfaceNamespace;
    }

    public function __toString(): string
    {
        return $this->interfaceNamespace;
    }
}
