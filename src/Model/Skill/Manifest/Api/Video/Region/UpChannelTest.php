<?php

declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\Manifest\Api\Video\Region;

use Omissis\AlexaSdk\Model\Skill\Manifest\Api\Video\Region\UpChannel\Type;
use Omissis\AlexaSdk\Model\Uri\Uri;
use PHPUnit\Framework\TestCase;

final class UpChannelTest extends TestCase
{
    function test_it_exposes_accessors(): void
    {
        $type = new Type('SNS');
        $uri = new Uri('arn:aws:sns:us-east-1:291420629295:sampleSkill');

        $upChannel = new UpChannel($type, $uri);

        $this->assertSame($type, $upChannel->getType());
        $this->assertSame($uri, $upChannel->getUri());
    }
}
