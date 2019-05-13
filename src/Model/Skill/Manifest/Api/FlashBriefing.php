<?php

namespace Omissis\AlexaSdk\Model\Skill\Manifest\Api;

use Omissis\AlexaSdk\Model\Skill\Manifest\Api;
use Omissis\AlexaSdk\Model\Skill\Manifest\Api\FlashBriefing\Locale;

final class FlashBriefing implements Api
{
    /**
     * @var array<string, Locale>
     */
    private $locales;

    /**
     * @param array<string, Locale> $locales
     */
    public function __construct(array $locales)
    {
        $this->locales = $locales;
    }

    /**
     * @return array<string, Locale>
     */
    public function getLocales(): array
    {
        return $this->locales;
    }
}
