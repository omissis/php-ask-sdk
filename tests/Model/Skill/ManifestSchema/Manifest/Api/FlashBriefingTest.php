<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\ManifestSchema\Manifest\Api;

use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\FlashBriefing;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\FlashBriefing\Locale;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\FlashBriefing\Locale\Feed;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\FlashBriefing\Locale\Feed\ContentGenre;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\FlashBriefing\Locale\Feed\ContentType;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\FlashBriefing\Locale\Feed\UpdateFrequency;
use Omissis\AlexaSdk\Model\Uri\Uri;
use Omissis\AlexaSdk\Model\Uri\Url;
use PHPUnit\Framework\TestCase;

final class FlashBriefingTest extends TestCase
{
    public function test_it_exposes_accessors(): void
    {
        $name = 'feed name';
        $isDefault = true;
        $vuiPreamble = 'In this skill';
        $updateFrequency = new UpdateFrequency('HOURLY');
        $genre = new ContentGenre('POLITICS');
        $imageUri = new Uri('https://example.com/img.jpg');
        $contentType = new ContentType('TEXT');
        $url = new Url('https://example.com/feed.xml');

        $feed = new Feed($name, $isDefault, $vuiPreamble, $updateFrequency, $genre, $imageUri, $contentType, $url);

        $locale = new Locale('Some error', [$feed]);
        $flashBriefing = new FlashBriefing(['en-US' => $locale]);

        $this->assertSame(['en-US' => $locale], $flashBriefing->getLocales());
    }
}
