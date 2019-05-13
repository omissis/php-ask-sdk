<?php

declare(strict_types=1);

namespace Omissis\AlexaSdk\Model;

use Omissis\AlexaSdk\Model\Skill\Manifest;

final class SkillManifestSchema
{
    /**
     * @var Manifest
     */
    private $manifest;

    public function __construct(Manifest $manifest)
    {
        $this->manifest = $manifest;
    }

    public function getManifest(): Manifest
    {
        return $this->manifest;
    }
}
