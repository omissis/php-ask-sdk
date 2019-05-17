<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\Manifest\PublishingInformation;

final class DistributionCountry
{
    /**
     * @var string
     */
    private $distributionCountry;

    /**
     * @throws InvalidDistributionCountryException
     */
    public function __construct(string $distributionCountry)
    {
        if (strlen($distributionCountry) !== 2) {
            throw new InvalidDistributionCountryException($distributionCountry);
        }

        $this->distributionCountry = strtoupper($distributionCountry);
    }

    public function __toString(): string
    {
        return $this->distributionCountry;
    }
}
