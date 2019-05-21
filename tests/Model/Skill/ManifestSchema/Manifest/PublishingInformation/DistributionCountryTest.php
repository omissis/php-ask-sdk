<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\ManifestSchema\Manifest\PublishingInformation;

use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\PublishingInformation\DistributionCountry;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\PublishingInformation\InvalidDistributionCountryException;
use PHPUnit\Framework\TestCase;

final class DistributionCountryTest extends TestCase
{
    public function testIsNotInitializableUsingAWrongDistributionCountryCode(): void
    {
        $this->expectException(InvalidDistributionCountryException::class);

        new DistributionCountry('ITALY');
    }

    public function testIsConvertibleToString(): void
    {
        $this->assertSame('IT', (string) new DistributionCountry('IT'));
    }
}
