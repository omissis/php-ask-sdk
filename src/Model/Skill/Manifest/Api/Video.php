<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\Manifest\Api;

use Omissis\AlexaSdk\Model\Skill\Manifest\Api;
use Omissis\AlexaSdk\Model\Skill\Manifest\Api\Video\Endpoint;
use Omissis\AlexaSdk\Model\Skill\Manifest\Api\Video\Locale;
use Omissis\AlexaSdk\Model\Skill\Manifest\Api\Video\Region;

final class Video implements Api
{
    /**
     * Object that contains <locale> Objects for each supported locale. Object
     *
     * @var Locale[]
     */
    private $locales;

    /**
     * Undocumented field.
     *
     * @var Endpoint
     */
    private $endpoint;

    /**
     * Contains an array of the supported <region> Objects  Array of Object
     *
     * @var Region[]
     */
    private $regions;

    /**
     * @param Locale[] $locales
     * @param Region[] $regions
     */
    public function __construct(array $locales, Endpoint $endpoint, array $regions)
    {
        $this->locales = $locales;
        $this->endpoint = $endpoint;
        $this->regions = $regions;
    }

    /**
     * @return Locale[]
     */
    public function getLocales(): array
    {
        return $this->locales;
    }

    public function getEndpoint(): Endpoint
    {
        return $this->endpoint;
    }

    /**
     * @return Region[]
     */
    public function getRegions(): array
    {
        return $this->regions;
    }
}
