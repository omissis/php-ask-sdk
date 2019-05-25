<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\InteractionModel\Prompt;

/*final */class Variation
{
    public const ALLOWED_TYPES = ['PlainText', 'SSML'];

    /**
     * One of: "PlainText" or "SSML"
     *
     * @var string
     */
    private $type;

    /**
     * Text that Alexa says as a prompt.
     *
     * @var string
     */
    private $value;

    /**
     * @throws InvalidVariationTypeException
     */
    public function __construct(string $type, string $value)
    {
        if (!in_array($type, self::ALLOWED_TYPES, true)) {
            throw new InvalidVariationTypeException($type);
        }

        $this->type = $type;
        $this->value = $value;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
