<?php

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
     * @var array<string, Locale>
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
     * @var array<string, Region>
     */
    private $regions;

    /**
     * @param array<string, Locale> $locales
     * @param array<string, Region> $regions
     */
    public function __construct(array $locales, Endpoint $endpoint, array $regions)
    {
        $this->locales = $locales;
        $this->endpoint = $endpoint;
        $this->regions = $regions;
    }

    /**
     * @return array<string, Locale>
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
     * @return array<string, Region>
     */
    public function getRegions(): array
    {
        return $this->regions;
    }
}
