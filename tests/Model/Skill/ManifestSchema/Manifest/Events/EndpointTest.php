<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\ManifestSchema\Manifest\Events;

use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Events\Endpoint;
use Omissis\AlexaSdk\Model\Uri\Uri;
use PHPUnit\Framework\TestCase;

final class EndpointTest extends TestCase
{
    public function testItExposesAccessors(): void
    {
        $uri = new Uri('https:://example.com/custom');
        $endpoint = new Endpoint($uri);

        $this->assertSame($uri, $endpoint->getUri());
    }
}
