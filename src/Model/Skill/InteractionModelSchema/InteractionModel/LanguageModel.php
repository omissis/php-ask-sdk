<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\InteractionModel;

/*final */class LanguageModel
{
    /**
     * @var LanguageModel\InvocationName
     */
    private $invocationName;

    /**
     * @var LanguageModel\Intent[]
     */
    private $intents;

    /**
     * @var LanguageModel\Type[]
     */
    private $types;

    /**
     * @param LanguageModel\Intent[] $intents
     * @param LanguageModel\Type[] $types
     */
    public function __construct(LanguageModel\InvocationName $invocationName, array $intents, array $types)
    {
        $this->invocationName = $invocationName;
        $this->intents = $intents;
        $this->types = $types;
    }

    public function getInvocationName(): LanguageModel\InvocationName
    {
        return $this->invocationName;
    }

    public function setInvocationName(LanguageModel\InvocationName $invocationName): void
    {
        $this->invocationName = $invocationName;
    }

    /**
     * @return LanguageModel\Intent[]
     */
    public function getIntents(): array
    {
        return $this->intents;
    }

    /**
     * @return LanguageModel\Type[]
     */
    public function getTypes(): array
    {
        return $this->types;
    }
}
