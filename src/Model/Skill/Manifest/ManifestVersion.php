<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\Manifest;

final class ManifestVersion
{
    /**
     * @var string
     */
    private $manifestVersion;

    public function __construct(string $manifestVersion)
    {
        $this->manifestVersion = $manifestVersion;
    }

    public function __toString(): string
    {
        return $this->manifestVersion;
    }
}
