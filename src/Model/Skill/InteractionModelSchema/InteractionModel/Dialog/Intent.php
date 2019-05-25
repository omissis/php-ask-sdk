<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\InteractionModel\Dialog;

/*final */class Intent
{
    /**
     * Name of the intent that has dialog rules
     *
     * @var string
     */
    private $name;

    /**
     * Specifies whether the dialog for this intent should be automatically delegated to Alexa. This can be ALWAYS (auto-delegation is on for this intent) or SKILL_RESPONSE (auto-delegation is off for the intent). When this property is not present, the intent uses the skill-level delegationStrategy.
     *
     * @var null|string
     */
    private $delegationStrategy;

    /**
     * List of slots in this intent that have dialog rules
     *
     * @var null|Intent\Slot[]
     */
    private $slots;

    /**
     * Describes whether confirmation of the intent is required
     *
     * @var null|boolean
     */
    private $confirmationRequired;

    /**
     * Collection of prompts for this intent
     *
     * @var null|string[]
     */
    private $prompts;

    /**
     * @param null|Intent\Slot[] $slots
     * @param null|string[] $prompts
     */
    public function __construct(
        string $name,
        ?string $delegationStrategy = null,
        ?array $slots = null,
        ?bool $confirmationRequired = null,
        ?array $prompts = null
    ) {
        $this->name = $name;
        $this->delegationStrategy = $delegationStrategy;
        $this->slots = $slots;
        $this->confirmationRequired = $confirmationRequired;
        $this->prompts = $prompts;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDelegationStrategy(): ?string
    {
        return $this->delegationStrategy;
    }

    /**
     * @return null|Intent\Slot[]
     */
    public function getSlots(): ?array
    {
        return $this->slots;
    }

    public function getConfirmationRequired(): ?bool
    {
        return $this->confirmationRequired;
    }

    /**
     * @return null|string[]
     */
    public function getPrompts(): ?array
    {
        return $this->prompts;
    }
}
