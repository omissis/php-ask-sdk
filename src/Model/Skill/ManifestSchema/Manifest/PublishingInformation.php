<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest;

use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\PublishingInformation\Category;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\PublishingInformation\DistributionCountry;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\PublishingInformation\DistributionMode;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\PublishingInformation\Locale;

/*final */class PublishingInformation
{
    /**
     * Object that contains <locale> objects for each supported locale.
     *
     * @var Locale[]
     */
    private $locales;

    /**
     * Array specifying distribution country/region strings in ISO 3166-1 alpha-2 format, for example US, GB or DE. This array should only contain values if availableWorldwide is false.
     *
     * @var null|DistributionCountry[]
     */
    private $distributionCountries;

    /**
     * true to indicate the skill is available worldwide; otherwise, false. If false, countries must be listed for distributionCountries.
     *
     * @var null|bool
     */
    private $isAvailableWorldwide;

    /**
     * PUBLIC if the skill is distributed without restriction. PRIVATE if the skill is available only to a private distribution list.
     *
     * @var null|DistributionMode
     */
    private $distributionMode;

    /**
     * Indicates any special instructions for testing the skill, such as a test account.
     *
     * @var null|string
     */
    private $testingInstructions;

    /**
     * Indicates the filter category for the skill in the Alexa App such as NEWS or SMART_HOME. See Category enumeration.
     *
     * @var null|Category
     */
    private $category;

    /**
     * @param Locale[] $locales
     * @param null|DistributionCountry[] $distributionCountries
     */
    public function __construct(
        array $locales,
        ?array $distributionCountries = null,
        ?bool $isAvailableWorldwide = null,
        ?DistributionMode $distributionMode = null,
        ?string $testingInstructions = null,
        ?Category $category = null
    ) {
        $this->locales = $locales;
        $this->distributionCountries = $distributionCountries;
        $this->isAvailableWorldwide = $isAvailableWorldwide;
        $this->distributionMode = $distributionMode;
        $this->testingInstructions = $testingInstructions;
        $this->category = $category;
    }

    /**
     * @return Locale[]
     */
    public function getLocales(): array
    {
        return $this->locales;
    }

    /**
     * @return null|DistributionCountry[]
     */
    public function getDistributionCountries(): ?array
    {
        return $this->distributionCountries;
    }

    public function isAvailableWorldwide(): ?bool
    {
        return $this->isAvailableWorldwide;
    }

    public function getDistributionMode(): ?DistributionMode
    {
        return $this->distributionMode;
    }

    public function getTestingInstructions(): ?string
    {
        return $this->testingInstructions;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }
}
