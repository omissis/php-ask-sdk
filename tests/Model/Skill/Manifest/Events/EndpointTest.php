<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\Manifest\Events;

use Omissis\AlexaSdk\Model\Skill\Manifest\Events\Endpoint;
use Omissis\AlexaSdk\Model\Uri\Uri;
use PHPUnit\Framework\TestCase;

final class EndpointTest extends TestCase
{
    public function test_it_exposes_accessors(): void
    {
        $uri = new Uri('https:://example.com/custom');
        $endpoint = new Endpoint($uri);

        $this->assertSame($uri, $endpoint->getUri());
    }
}
