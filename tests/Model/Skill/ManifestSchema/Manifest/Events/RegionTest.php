<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\ManifestSchema\Manifest\Events;

use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Events\Endpoint;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Events\Region;
use Omissis\AlexaSdk\Model\Uri\Uri;
use PHPUnit\Framework\TestCase;

final class RegionTest extends TestCase
{
    public function testItExposesAccessors(): void
    {
        $endpoint = new Endpoint(new Uri('https:://example.com/custom'));
        $region = new Region($endpoint);

        $this->assertSame($endpoint, $region->getEndpoint());
    }
}
