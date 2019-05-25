<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill;

use Omissis\AlexaSdk\Model\Skill\InteractionModelSchema;
use Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\InteractionModel;
use Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\Version;
use PHPUnit\Framework\TestCase;

final class InteractionModelSchemaTest extends TestCase
{
    public function testItExposesAccessors(): void
    {
        $interactionModel = $this->prophesize(InteractionModel::class)->reveal();
        $version = new Version('2');
        $interactionModelSchema = new InteractionModelSchema($interactionModel, $version);

        $this->assertSame($interactionModel, $interactionModelSchema->getInteractionModel());
        $this->assertSame($version, $interactionModelSchema->getVersion());
    }
}
