<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\ManifestSchema\Manifest\Api\AlexaForBusiness\SupportedInterface;

use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\AlexaForBusiness\SupportedInterface\InvalidRequestNameException;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\AlexaForBusiness\SupportedInterface\Request;
use PHPUnit\Framework\TestCase;

final class RequestTest extends TestCase
{
    public function testItIsNotInitializableWithWrongName(): void
    {
        $this->expectException(InvalidRequestNameException::class);

        new Request('Foo');
    }

    /**
     * @dataProvider allowedNamesProvider
     */
    public function testItExposesAccessors(): void
    {
        $request = new Request('Search');

        $this->assertSame('Search', $request->getName());
    }

    public function allowedNamesProvider(): \Generator
    {
        yield ['Search'];

        yield ['Create'];

        yield ['Update'];
    }
}
