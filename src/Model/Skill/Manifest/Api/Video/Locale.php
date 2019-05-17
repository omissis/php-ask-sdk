<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\Manifest\Api\Video;

use Omissis\AlexaSdk\Model\Skill\Manifest\Api\Video\Locale\CatalogInformation;
use Omissis\AlexaSdk\Model\Skill\Manifest\Api\Video\Locale\VideoProviderTargetingName;

final class Locale
{
    /**
     * List of names.
     *
     * @var VideoProviderTargetingName[]
     */
    private $videoProviderTargetingNames;

    /**
     * Undocumented field.
     *
     * @var CatalogInformation[]
     */
    private $catalogInformation;

    /**
     * @param VideoProviderTargetingName[] $videoProviderTargetingNames
     * @param CatalogInformation[] $catalogInformation
     */
    public function __construct(array $videoProviderTargetingNames, array $catalogInformation)
    {
        $this->videoProviderTargetingNames = $videoProviderTargetingNames;
        $this->catalogInformation = $catalogInformation;
    }

    /**
     * @return VideoProviderTargetingName[]
     */
    public function getVideoProviderTargetingNames(): array
    {
        return $this->videoProviderTargetingNames;
    }

    /**
     * @return CatalogInformation[]
     */
    public function getCatalogInformation(): array
    {
        return $this->catalogInformation;
    }
}
