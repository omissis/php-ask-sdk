<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\AlexaForBusiness\SupportedInterface;

final class Request
{
    public const ALLOWED_NAMES = ['Search', 'Create', 'Update'];

    /**
     * @var string
     */
    private $name;

    /**
     * @throws InvalidRequestNameException
     */
    public function __construct(string $name)
    {
        if (!in_array($name, self::ALLOWED_NAMES, true)) {
            throw new InvalidRequestNameException($name);
        }

        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
