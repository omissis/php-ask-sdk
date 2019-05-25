<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\InteractionModel\LanguageModel\Intent;

/*final */class Slot
{
    /**
     * Name of the slot
     *
     * @var string
     */
    private $name;

    /**
     * Type of the slot
     *
     * @var string
     */
    private $type;

    /**
     * Sample utterances for the slot
     *
     * @var null|string[]
     */
    private $samples;

    /**
     * @param null|string[] $samples
     */
    public function __construct(string $name, string $type, ?array $samples = null)
    {
        $this->name = $name;
        $this->type = $type;
        $this->samples = $samples;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string[]|null
     */
    public function getSamples(): ?array
    {
        return $this->samples;
    }
}
