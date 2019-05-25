<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\InteractionModelSchema;

use Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\InteractionModel;
use PHPUnit\Framework\TestCase;

final class InteractionModelTest extends TestCase
{
    public function testItExposesAccessors(): void
    {
        $languageModel = $this->prophesize(InteractionModel\LanguageModel::class)->reveal();
        $dialog = $this->prophesize(InteractionModel\Dialog::class)->reveal();
        $prompts = [$this->prophesize(InteractionModel\Prompt::class)->reveal()];

        $interactionModel = new InteractionModel($languageModel, $dialog, $prompts);

        $this->assertSame($languageModel, $interactionModel->getLanguageModel());
        $this->assertSame($dialog, $interactionModel->getDialog());
        $this->assertSame($prompts, $interactionModel->getPrompts());
    }
}
