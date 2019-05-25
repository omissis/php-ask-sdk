<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\InteractionModel\LanguageModel\Intent;

/*final */class Sample
{
    /**
     * @var string
     */
    private $sample;

    public function __construct(string $sample)
    {
        $this->sample = $sample;
    }

    public function __toString(): string
    {
        return $this->sample;
    }
}
