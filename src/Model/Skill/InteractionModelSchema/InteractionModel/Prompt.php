<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\InteractionModel;

use Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\InteractionModel\Prompt\Variation;

/*final */class Prompt
{
    /**
     * Identifier of the prompt
     *
     * @var string
     */
    private $id;

    /**
     * List of variations of the prompt.
     *
     * @var Variation[]
     */
    private $variations;

    /**
     * @param Variation[] $variations
     */
    public function __construct(string $id, array $variations)
    {
        $this->id = $id;
        $this->variations = $variations;
    }

    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return Variation[]
     */
    public function getVariations(): array
    {
        return $this->variations;
    }
}
