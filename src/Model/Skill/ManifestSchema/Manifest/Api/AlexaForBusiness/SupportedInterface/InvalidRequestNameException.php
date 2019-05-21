<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\AlexaForBusiness\SupportedInterface;

use Omissis\AlexaSdk\Model\Exception;

final class InvalidRequestNameException extends Exception
{
    /**
     * @var string
     */
    private $invalidRequestName;

    public function __construct(string $invalidRequestName)
    {
        $this->invalidRequestName = $invalidRequestName;

        parent::__construct(sprintf(
            'Invalid request name: %s. Allowed values are: "%s".',
            $invalidRequestName,
            implode('", "', Request::ALLOWED_NAMES)
        ));
    }

    public function getInvalidRequestName(): string
    {
        return $this->invalidRequestName;
    }
}
