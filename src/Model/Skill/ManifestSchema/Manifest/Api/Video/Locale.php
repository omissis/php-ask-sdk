<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\Video;

use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\Video\Locale\CatalogInformation;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\Video\Locale\VideoProviderTargetingName;

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
     * @var null|CatalogInformation[]
     */
    private $catalogInformation;

    /**
     * @param VideoProviderTargetingName[] $videoProviderTargetingNames
     * @param null|CatalogInformation[] $catalogInformation
     */
    public function __construct(array $videoProviderTargetingNames, ?array $catalogInformation = null)
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
     * @return null|CatalogInformation[]
     */
    public function getCatalogInformation(): ?array
    {
        return $this->catalogInformation;
    }
}
