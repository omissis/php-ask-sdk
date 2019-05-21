<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill;

use Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\InteractionModel;

final class InteractionModelSchema
{
    /**
     * @var InteractionModel
     */
    private $interactionModel;

    /**
     * @var null|string
     */
    private $version;

    public function __construct(InteractionModel $interactionModel, ?string $version = null)
    {
        $this->interactionModel = $interactionModel;
        $this->version = $version;
    }

    public function getInteractionModel(): InteractionModel
    {
        return $this->interactionModel;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }
}
