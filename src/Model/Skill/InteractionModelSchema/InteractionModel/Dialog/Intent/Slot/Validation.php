<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\InteractionModel\Dialog\Intent\Slot;

/*final */class Validation
{
    /**
     * Enum value to reference the type of validation rule.
     *
     * @var string
     */
    private $type;

    /**
     * ID to reference the set of prompts for this validation rule.
     *
     * @var string
     */
    private $prompt;

    /**
     * Undocumented field.
     *
     * @var null|string[]
     */
    private $values;

    /**
     * @param null|string[] $values
     */
    public function __construct(string $type, string $prompt, ?array $values = null)
    {
        $this->type = $type;
        $this->prompt = $prompt;
        $this->values = $values;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getPrompt(): string
    {
        return $this->prompt;
    }

    /**
     * @return null|string[]
     */
    public function getValues(): ?array
    {
        return $this->values;
    }
}
