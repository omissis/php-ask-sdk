<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\InteractionModel\LanguageModel;

/*final */class InvocationName
{
    /**
     * @var string
     */
    private $invocationName;

    public function __construct(string $invocationName)
    {
        $this->invocationName = $invocationName;
    }

    public function __toString(): string
    {
        return $this->invocationName;
    }
}
