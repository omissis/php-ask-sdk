<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\InteractionModel\LanguageModel\Type;

/*final */class Value
{
    /**
     * Identifier for a value of a custom slot type
     *
     * @var null|Value\Id
     */
    private $id;

    /**
     * Describes a value of a custom slot type
     *
     * @var Value\Name
     */
    private $name;

    public function __construct(Value\Name $name, ?Value\Id $id = null)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId(): ?Value\Id
    {
        return $this->id;
    }

    public function getName(): Value\Name
    {
        return $this->name;
    }
}
