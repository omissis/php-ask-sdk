<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\ManifestSchema\Manifest\Api\FlashBriefing\Locale;

use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\FlashBriefing\Locale\Feed;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\FlashBriefing\Locale\Feed\ContentGenre;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\FlashBriefing\Locale\Feed\ContentType;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\FlashBriefing\Locale\Feed\UpdateFrequency;
use Omissis\AlexaSdk\Model\Uri\Uri;
use Omissis\AlexaSdk\Model\Uri\Url;
use PHPUnit\Framework\TestCase;

final class FeedTest extends TestCase
{
    public function testItExposesAccessors(): void
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

        $this->assertSame($name, $feed->getName());
        $this->assertTrue($feed->isDefault());
        $this->assertSame($vuiPreamble, $feed->getVuiPreamble());
        $this->assertSame($updateFrequency, $feed->getUpdateFrequency());
        $this->assertSame($genre, $feed->getGenre());
        $this->assertSame($imageUri, $feed->getImageUri());
        $this->assertSame($contentType, $feed->getContentType());
        $this->assertSame($url, $feed->getUrl());
    }
}
