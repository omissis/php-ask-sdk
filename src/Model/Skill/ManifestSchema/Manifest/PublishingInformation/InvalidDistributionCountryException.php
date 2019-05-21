<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\PublishingInformation;

use Omissis\AlexaSdk\Model\Exception;

final class InvalidDistributionCountryException extends Exception
{
    /**
     * @var string
     */
    private $invalidDistributionCountry;

    public function __construct(string $invalidDistributionCountry)
    {
        $this->invalidDistributionCountry = $invalidDistributionCountry;

        parent::__construct(sprintf(
            'Invalid distributionMode name: "%s". Allowed values are 2-chars long ISO 3166-1 codes.',
            $invalidDistributionCountry
        ));
    }

    public function getInvalidDistributionCountry(): string
    {
        return $this->invalidDistributionCountry;
    }
}
