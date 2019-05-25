<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\InteractionModel;

/*final */class Dialog
{
    /**
     * List of intents that have dialog rules associated with them.
     *
     * @var Dialog\Intent[]
     */
    private $intents;

    /**
     * Specifies whether dialogs in this skill should be automatically delegated to Alexa.
     *
     * This can be ALWAYS (auto-delegation is on for the overall skill)
     * or SKILL_RESPONSE (auto-delegation is off for the overall skill).
     * You can override this setting at the intent level.
     *
     * @var string
     */
    private $delegationStrategy;

    /**
     * @param Dialog\Intent[] $intents
     */
    public function __construct(array $intents, string $delegationStrategy)
    {
        $this->intents = $intents;
        $this->delegationStrategy = $delegationStrategy;
    }

    /**
     * @return Dialog\Intent[]
     */
    public function getIntents(): array
    {
        return $this->intents;
    }

    public function getDelegationStrategy(): string
    {
        return $this->delegationStrategy;
    }
}
