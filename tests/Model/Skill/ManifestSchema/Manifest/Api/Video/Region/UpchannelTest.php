<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\ManifestSchema\Manifest\Api\Video\Region;

use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\Video\Region\Upchannel;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\Video\Region\Upchannel\Type;
use Omissis\AlexaSdk\Model\Uri\Uri;
use PHPUnit\Framework\TestCase;

final class UpchannelTest extends TestCase
{
    public function test_it_exposes_accessors(): void
    {
        $type = new Type('SNS');
        $uri = new Uri('arn:aws:sns:us-east-1:291420629295:sampleSkill');

        $upChannel = new Upchannel($type, $uri);

        $this->assertSame($type, $upChannel->getType());
        $this->assertSame($uri, $upChannel->getUri());
    }
}
