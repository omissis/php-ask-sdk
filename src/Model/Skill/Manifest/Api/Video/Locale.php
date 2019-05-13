<?php

declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\Manifest\Api\Video;

use Omissis\AlexaSdk\Model\Skill\Manifest\Api\Video\Locale\CatalogInformation;
use Omissis\AlexaSdk\Model\Skill\Manifest\Api\Video\Locale\VideoProviderTargetingName;

final class Locale
{
    /**
     * List of names.
     *
     * @var array<string, VideoProviderTargetingName>
     */
    private $videoProviderTargetingNames;

    /**
     * Undocumented field.
     *
     * @var array<CatalogInformation>
     */
    private $catalogInformation;

    /**
     * @param array<string, VideoProviderTargetingName>
     * @param array<CatalogInformation>
     */
    public function __construct(array $videoProviderTargetingNames, array $catalogInformation)
    {
        $this->videoProviderTargetingNames = $videoProviderTargetingNames;
        $this->catalogInformation = $catalogInformation;
    }

    /**
     * @return array<string, VideoProviderTargetingName>
     */
    public function getVideoProviderTargetingNames(): array
    {
        return $this->videoProviderTargetingNames;
    }

    /**
     * @return array<CatalogInformation>
     */
    public function getCatalogInformation(): array
    {
        return $this->catalogInformation;
    }
}
