<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\InteractionModel\LanguageModel;

/*final */class Type
{
    /**
     * Name of the custom slot type.
     *
     * @var string
     */
    private $name;

    /**
     * List of representative values for the slot.
     *
     * @var Type\Value[]
     */
    private $values;

    /**
     * @param Type\Value[] $values
     */
    public function __construct(string $name, array $values)
    {
        $this->name = $name;
        $this->values = $values;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return Type\Value[]
     */
    public function getValues(): array
    {
        return $this->values;
    }

    /**
     * @param Type\Value[] $values
     */
    public function setValues(array $values): void
    {
        $this->values = $values;
    }
}
