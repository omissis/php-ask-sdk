<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\Manifest\PublishingInformation;

use Omissis\AlexaSdk\Model\Skill\Manifest\PublishingInformation\DistributionCountry;
use Omissis\AlexaSdk\Model\Skill\Manifest\PublishingInformation\InvalidDistributionCountryException;
use PHPUnit\Framework\TestCase;

final class DistributionCountryTest extends TestCase
{
    function test_is_not_initializable_using_a_wrong_distribution_country_code()
    {
        $this->expectException(InvalidDistributionCountryException::class);

        new DistributionCountry('ITALY');
    }

    function test_is_convertible_to_string(): void
    {
        $this->assertSame('IT', (string) new DistributionCountry('IT'));
    }
}
