<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\InteractionModelSchema;

use Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\InteractionModel\Dialog;
use Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\InteractionModel\LanguageModel;
use Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\InteractionModel\Prompts;

final class InteractionModel
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
     * @var Prompts
     */
    private $prompts;

    public function __construct(LanguageModel $languageModel, Dialog $dialog, Prompts $prompts)
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

    public function getPrompts(): Prompts
    {
        return $this->prompts;
    }
}
