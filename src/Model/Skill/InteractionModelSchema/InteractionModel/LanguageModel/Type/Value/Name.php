<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\InteractionModel\LanguageModel\Type\Value;

/*final */class Name
{
    /**
     * A value for a custom slot type
     *
     * @var string
     */
    private $value;

    /**
     * List of potential synonyms for a value of a custom slot type
     *
     * @var null|string[]
     */
    private $synonyms;

    /**
     * @param null|string[] $synonyms
     */
    public function __construct(string $value, ?array $synonyms = null)
    {
        $this->value = $value;
        $this->synonyms = $synonyms;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @return null|string[]
     */
    public function getSynonyms(): ?array
    {
        return $this->synonyms;
    }
}
