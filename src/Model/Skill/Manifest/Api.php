<?php

declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\Manifest;

interface Api
{
    public const ALLOWED_API_NAMES = [
        'alexaForBusiness',
        'custom',
        'smartHome',
        'flashBriefing',
        'householdList',
        'video',
        'health',
    ];
}
