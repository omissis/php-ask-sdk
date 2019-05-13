<?php

declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\Manifest\Api\Video\Locale;

final class VideoProviderTargetingName
{
    /**
     * @var string
     */
    private $videoProviderTargetingName;

    public function __construct(string $videoProviderTargetingName)
    {
        $this->videoProviderTargetingName = $videoProviderTargetingName;
    }

    public function __toString(): string
    {
        return $this->videoProviderTargetingName;
    }
}
