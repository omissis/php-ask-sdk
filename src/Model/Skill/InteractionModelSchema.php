<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill;

use Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\InteractionModel;
use Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\Version;

/*final */class InteractionModelSchema
{
    /**
     * @var InteractionModel
     */
    private $interactionModel;

    /**
     * @var null|Version
     */
    private $version;

    public function __construct(InteractionModel $interactionModel, ?Version $version = null)
    {
        $this->interactionModel = $interactionModel;
        $this->version = $version;
    }

    public function getInteractionModel(): InteractionModel
    {
        return $this->interactionModel;
    }

    public function getVersion(): ?Version
    {
        return $this->version;
    }
}
