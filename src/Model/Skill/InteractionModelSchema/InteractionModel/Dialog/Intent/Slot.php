<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\InteractionModel\Dialog\Intent;

/*final */class Slot
{
    /**
     * Name of the slot in the dialog intent
     *
     * @var string
     */
    private $name;

    /**
     * Type of the slot in the dialog intent
     *
     * @var string
     */
    private $type;

    /**
     * Describes whether elicitation of the slot is required
     *
     * @var null|boolean
     */
    private $elicitationRequired;

    /**
     * Describes whether confirmation of the slot is required
     *
     * @var null|boolean
     */
    private $confirmationRequired;

    /**
     * Collection of prompts for this slot
     *
     * @var string[]
     */
    private $prompts;

    /**
     * List of validation rules for this slot
     *
     * @var null|Slot\Validation[]
     */
    private $validations;

    /**
     * @param string[] $prompts
     * @param null|Slot\Validation[] $validations
     */
    public function __construct(
        string $name,
        string $type,
        ?bool $elicitationRequired = null,
        ?bool $confirmationRequired = null,
        array $prompts = [],
        ?array $validations = null
    ) {
        $this->name = $name;
        $this->type = $type;
        $this->elicitationRequired = $elicitationRequired;
        $this->confirmationRequired = $confirmationRequired;
        $this->prompts = $prompts;
        $this->validations = $validations;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getElicitationRequired(): ?bool
    {
        return $this->elicitationRequired;
    }

    public function getConfirmationRequired(): ?bool
    {
        return $this->confirmationRequired;
    }

    /**
     * @return string[]
     */
    public function getPrompts(): array
    {
        return $this->prompts;
    }

    /**
     * @return null|Slot\Validation[]
     */
    public function getValidations(): ?array
    {
        return $this->validations;
    }
}
