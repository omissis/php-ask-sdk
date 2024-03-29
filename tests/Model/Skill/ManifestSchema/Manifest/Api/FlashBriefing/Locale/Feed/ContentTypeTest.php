<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\ManifestSchema\Manifest\Api\FlashBriefing\Locale\Feed;

use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\FlashBriefing\Locale\Feed\ContentType;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\FlashBriefing\Locale\Feed\InvalidContentTypeException;
use PHPUnit\Framework\TestCase;

final class ContentTypeTest extends TestCase
{
    /**
     * @dataProvider contentTypeProvider
     */
    public function testItIsConvertibleToString(string $contentType): void
    {
        $this->assertSame($contentType, (string) new ContentType($contentType));
    }

    public function testItIsNotInitializableWithWrongContentType(): void
    {
        $this->expectException(InvalidContentTypeException::class);

        new ContentType('Foo');
    }

    public function contentTypeProvider(): \Generator
    {
        yield ['TEXT'];
        yield ['AUDIO'];
    }
}
