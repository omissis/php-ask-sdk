<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\ManifestSchema\Manifest\Api\Video\Locale;

use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\Video\Locale\VideoProviderTargetingName;
use PHPUnit\Framework\TestCase;

final class VideoProviderTargetingNameTest extends TestCase
{
    public function test_it_is_convertible_to_string(): void
    {
        $this->assertSame('TV Provider', (string) new VideoProviderTargetingName('TV Provider'));
    }
}
