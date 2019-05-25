<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\InteractionModelSchema\InteractionModel;

use Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\InteractionModel\Dialog;
use PHPUnit\Framework\TestCase;

final class DialogTest extends TestCase
{
    public function testItExposesAccessors(): void
    {
        $intent = $this->prophesize(Dialog\Intent::class)->reveal();
        $type = new Dialog([$intent], 'ALWAYS');

        $this->assertSame([$intent], $type->getIntents());
        $this->assertSame('ALWAYS', $type->getDelegationStrategy());
    }
}
