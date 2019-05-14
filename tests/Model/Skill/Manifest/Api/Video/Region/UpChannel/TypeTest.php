<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\Manifest\Api\Video\Region\UpChannel;

use Omissis\AlexaSdk\Model\Skill\Manifest\Api\Video\Region\Upchannel\Type;
use PHPUnit\Framework\TestCase;

final class TypeTest extends TestCase
{
    function test_it_is_convertible_to_string(): void
    {
        $this->assertSame('SNS', (string) new Type('SNS'));
    }
}
