<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\InteractionModel\LanguageModel;

/*final */class Intent
{
    /**
     * Name of the intent
     *
     * @var string
     */
    private $name;

    /**
     * List of slots within the intent
     *
     * @var null|Intent\Slot[]
     */
    private $slots;

    /**
     * Sample utterances for the intent
     *
     * @var null|Intent\Sample[]
     */
    private $samples;

    /**
     * @param null|Intent\Slot[] $slots
     * @param null|Intent\Sample[] $samples
     */
    public function __construct(string $name, ?array $slots = null, ?array $samples = null)
    {
        $this->name = $name;
        $this->slots = $slots;
        $this->samples = $samples;
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return null|Intent\Slot[]
     */
    public function getSlots(): ?array
    {
        return $this->slots;
    }

    /**
     * @return null|Intent\Sample[]
     */
    public function getSamples(): ?array
    {
        return $this->samples;
    }
}
