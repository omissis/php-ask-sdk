<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\ManifestSchema\Manifest\Api\Video\Region\UpChannel;

use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\Video\Region\Upchannel\Type;
use PHPUnit\Framework\TestCase;

final class TypeTest extends TestCase
{
    public function testItIsConvertibleToString(): void
    {
        $this->assertSame('SNS', (string) new Type('SNS'));
    }
}
