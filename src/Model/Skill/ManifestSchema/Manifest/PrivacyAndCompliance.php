<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest;

use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\PrivacyAndCompliance\Locale;

final class PrivacyAndCompliance
{
    /**
     * true to indicate purchases can be made from this skill; otherwise, false.
     *
     * @var bool
     */
    private $allowsPurchases;

    /**
     * true to indicate this skill uses customer information, otherwise false.
     *
     * @var bool
     */
    private $usesPersonalInfo;

    /**
     * true to indicate the skill is directed at children under 13, otherwise false.
     *
     * To create a child-directed skill, isChildDirected must be set to true,
     * and the publishingInformation.category must be set to one of the following:
     * - CHILDRENS_EDUCATION_AND_REFERENCE
     * - CHILDRENS_GAMES
     * - CHILDRENS_MUSIC_AND_AUDIO
     * - CHILDRENS_NOVELTY_AND_HUMOR
     *
     * @var bool
     */
    private $isChildDirected;

    /**
     * true to indicate the skill can be exported to any country/region; otherwise, false.
     *
     * @var bool
     */
    private $isExportCompliant;

    /**
     * true to indicate the skill contains advertising; otherwise, false.
     *
     * @var bool
     */
    private $containsAds;

    /**
     * Object that contains <locale> objects for each supported locale.
     *
     * @var Locale[]
     */
    private $locales;

    /**
     * @param Locale[] $locales
     */
    public function __construct(
        bool $allowsPurchases,
        bool $usesPersonalInfo,
        bool $isChildDirected,
        bool $isExportCompliant,
        bool $containsAds,
        array $locales
    ) {
        $this->allowsPurchases = $allowsPurchases;
        $this->usesPersonalInfo = $usesPersonalInfo;
        $this->isChildDirected = $isChildDirected;
        $this->isExportCompliant = $isExportCompliant;
        $this->containsAds = $containsAds;
        $this->locales = $locales;
    }

    public function isAllowsPurchases(): bool
    {
        return $this->allowsPurchases;
    }

    public function isUsesPersonalInfo(): bool
    {
        return $this->usesPersonalInfo;
    }

    public function isChildDirected(): bool
    {
        return $this->isChildDirected;
    }

    public function isExportCompliant(): bool
    {
        return $this->isExportCompliant;
    }

    public function isContainsAds(): bool
    {
        return $this->containsAds;
    }

    /**
     * @return Locale[]
     */
    public function getLocales(): array
    {
        return $this->locales;
    }
}
