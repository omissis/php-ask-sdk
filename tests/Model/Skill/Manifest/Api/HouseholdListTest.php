<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\Manifest\Api;

use Omissis\AlexaSdk\Model\Skill\Manifest\Api;
use Omissis\AlexaSdk\Model\Skill\Manifest\Api\HouseholdList;
use PHPUnit\Framework\TestCase;

final class HouseholdListTest extends TestCase
{
    function test_is_an_empty_class()
    {
        $reflectionClass = new \ReflectionClass(HouseholdList::class);

        $this->assertCount(0, $reflectionClass->getMethods());
        $this->assertCount(0, $reflectionClass->getProperties());
    }
}
