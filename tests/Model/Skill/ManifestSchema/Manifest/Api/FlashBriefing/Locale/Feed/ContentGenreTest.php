<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\ManifestSchema\Manifest\Api\FlashBriefing\Locale\Feed;

use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\FlashBriefing\Locale\Feed\ContentGenre;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\FlashBriefing\Locale\Feed\InvalidContentGenreException;
use PHPUnit\Framework\TestCase;

final class ContentGenreTest extends TestCase
{
    /**
     * @dataProvider contentGenreProvider
     */
    public function testItIsConvertibleToString(string $contentGenre): void
    {
        $this->assertSame($contentGenre, (string) new ContentGenre($contentGenre));
    }

    public function testItIsNotInitializableWithWrongContentGenre(): void
    {
        $this->expectException(InvalidContentGenreException::class);

        new ContentGenre('Foo');
    }

    public function contentGenreProvider(): \Generator
    {
        yield ['HEADLINE_NEWS'];
        yield ['BUSINESS'];
        yield ['POLITICS'];
        yield ['ENTERTAINMENT'];
        yield ['TECHNOLOGY'];
        yield ['HUMOR'];
        yield ['LIFESTYLE'];
        yield ['SPORTS'];
        yield ['SCIENCE'];
        yield ['HEALTH_AND_FITNESS'];
        yield ['ARTS_AND_CULTURE'];
        yield ['PRODUCTIVITY_AND_UTILITIES'];
        yield ['OTHER'];
    }
}
