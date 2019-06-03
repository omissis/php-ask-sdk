<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill;

use Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\Description;
use Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\InteractionModel;

/*final */class UpdateInteractionModelSchema
{
    /**
     * @var InteractionModel
     */
    private $interactionModel;

    /**
     * @var null|Description
     */
    private $description;

    public function __construct(InteractionModel $interactionModel, ?Description $description = null)
    {
        $this->interactionModel = $interactionModel;
        $this->description = $description;
    }

    public function getInteractionModel(): InteractionModel
    {
        return $this->interactionModel;
    }

    public function getDescription(): ?Description
    {
        return $this->description;
    }
}
