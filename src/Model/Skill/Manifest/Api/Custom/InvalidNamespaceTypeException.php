<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\Manifest\Api\Custom;

use Omissis\AlexaSdk\Model\Exception;

final class InvalidNamespaceTypeException extends Exception
{
    /**
     * @var string
     */
    private $invalidNamespaceType;

    public function __construct(string $invalidNamespaceType)
    {
        parent::__construct(sprintf(
            'Invalid namespace: "%s". Allowed values are: "%s".',
            $invalidNamespaceType,
            implode('", "', SupportedInterface::ALLOWED_TYPES)
        ));

        $this->invalidNamespaceType = $invalidNamespaceType;
    }

    public function getInvalidNamespaceType(): string
    {
        return $this->invalidNamespaceType;
    }
}
