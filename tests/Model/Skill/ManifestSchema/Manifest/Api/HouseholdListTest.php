<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\ManifestSchema\Manifest\Api;

use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\HouseholdList;
use PHPUnit\Framework\TestCase;

final class HouseholdListTest extends TestCase
{
    public function test_is_an_empty_class(): void
    {
        $reflectionClass = new \ReflectionClass(HouseholdList::class);

        $this->assertCount(0, $reflectionClass->getMethods());
        $this->assertCount(0, $reflectionClass->getProperties());
    }
}
