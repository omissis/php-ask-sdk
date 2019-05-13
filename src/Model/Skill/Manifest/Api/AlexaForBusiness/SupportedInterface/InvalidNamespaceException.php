<?php

declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\Manifest\Api\AlexaForBusiness\SupportedInterface;

use Omissis\AlexaSdk\Model\Exception;

final class InvalidNamespaceException extends Exception
{
    /**
     * @var string
     */
    private $invalidNamespace;

    public function __construct(string $invalidNamespace)
    {
        $this->invalidNamespace = $invalidNamespace;

        parent::__construct(sprintf(
            'Invalid namespace: "%s". Allowed values are: "%s".',
            $invalidNamespace,
            implode('", "', InterfaceNamespace::ALLOWED_NAMESPACES)
        ));
    }

    public function getInvalidNamespace(): string
    {
        return $this->invalidNamespace;
    }
}
