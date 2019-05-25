<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\InteractionModelSchema\InteractionModel;

use Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\InteractionModel\LanguageModel;
use PHPUnit\Framework\TestCase;

final class LanguageModelTest extends TestCase
{
    public function testItExposesAccessors(): void
    {
        $invocationName = $this->prophesize(LanguageModel\InvocationName::class)->reveal();
        $intents = [$this->prophesize(LanguageModel\Intent::class)->reveal()];
        $types = [$this->prophesize(LanguageModel\Type::class)->reveal()];

        $languageModel = new LanguageModel($invocationName, $intents, $types);

        $this->assertSame($invocationName, $languageModel->getInvocationName());
        $this->assertSame($intents, $languageModel->getIntents());
        $this->assertSame($types, $languageModel->getTypes());
    }
}
