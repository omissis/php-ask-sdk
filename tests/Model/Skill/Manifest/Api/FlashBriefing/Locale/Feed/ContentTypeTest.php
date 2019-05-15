<?php

declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\Manifest\Api\FlashBriefing\Locale\Feed;

use Omissis\AlexaSdk\Model\Skill\Manifest\Api\FlashBriefing\Locale\Feed\ContentType;
use Omissis\AlexaSdk\Model\Skill\Manifest\Api\FlashBriefing\Locale\Feed\InvalidContentTypeException;
use PHPUnit\Framework\TestCase;

final class ContentTypeTest extends TestCase
{
    /**
     * @dataProvider contentTypeProvider
     */
    function test_it_is_convertible_to_string(string $contentType): void
    {
        $this->assertSame($contentType, (string) new ContentType($contentType));
    }

    function test_it_is_not_initializable_with_wrong_content_type(): void
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
