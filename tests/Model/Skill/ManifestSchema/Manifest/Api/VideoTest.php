<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\ManifestSchema\Manifest\Api;

use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\Video;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\Video\Locale;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\Video\Region;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\Video\Region\Upchannel;
use Omissis\AlexaSdk\Model\Uri\Uri;
use PHPUnit\Framework\TestCase;

final class VideoTest extends TestCase
{
    public function testItExposesAccessors(): void
    {
        $locale = new Locale([new Locale\VideoProviderTargetingName('TV provider')], [new Locale\CatalogInformation('1234', 'FIRE_TV')]);
        $endpoint = new Video\Endpoint(new Uri('arn:aws:lambda:us-east-1:452493640596:function:sampleSkill'));
        $region = new Region(
            new Region\Endpoint(new Uri('arn:aws:lambda:us-east-1:452493640596:function:sampleSkill')),
            [new Upchannel(new Upchannel\Type('SNS'), new Uri('arn:aws:sns:us-east-1:291420629295:sampleSkill'))]
        );

        $video = new Video(['en-US' => $locale], $endpoint, ['NA' => $region]);

        $this->assertSame(['en-US' => $locale], $video->getLocales());
        $this->assertSame($endpoint, $video->getEndpoint());
        $this->assertSame(['NA' => $region], $video->getRegions());
    }
}
