<?php

namespace Omissis\AlexaSdk\Model\Skill\Manifest\Api\AlexaForBusiness\SupportedInterface;

final class InterfaceNamespace
{
    public const ALLOWED_NAMESPACES = ['Alexa.Business.Reservation.Room'];

    /**
     * @var string
     */
    private $namespace;

    /**
     * @throws InvalidNamespaceException
     */
    public function __construct(string $namespace)
    {
        if (!in_array($namespace, self::ALLOWED_NAMESPACES, true)) {
            throw new InvalidNamespaceException($namespace);
        }

        $this->namespace = $namespace;
    }

    public function __toString(): string
    {
        return $this->namespace;
    }
}
