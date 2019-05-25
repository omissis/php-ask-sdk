<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\InteractionModelSchema;

use Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\InteractionModel\Dialog;
use Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\InteractionModel\LanguageModel;
use Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\InteractionModel\Prompt;

/*final */class InteractionModel
{
    /**
     * @var LanguageModel
     */
    private $languageModel;

    /**
     * @var Dialog
     */
    private $dialog;

    /**
     * @var Prompt[]
     */
    private $prompts;

    /**
     * @param Prompt[] $prompts
     */
    public function __construct(LanguageModel $languageModel, Dialog $dialog, array $prompts)
    {
        $this->languageModel = $languageModel;
        $this->dialog = $dialog;
        $this->prompts = $prompts;
    }

    public function getLanguageModel(): LanguageModel
    {
        return $this->languageModel;
    }

    public function getDialog(): Dialog
    {
        return $this->dialog;
    }

    /**
     * @return Prompt[]
     */
    public function getPrompts(): array
    {
        return $this->prompts;
    }
}
