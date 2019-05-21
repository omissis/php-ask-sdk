<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model;

use Omissis\AlexaSdk\Model\Skill\Manifest;
use Omissis\AlexaSdk\Model\Skill\VendorId;

final class SkillManifestSchema
{
    /**
     * @var null|Manifest
     */
    private $manifest;

    /**
     * @var null|Manifest
     */
    private $skillManifest;

    /**
     * @var null|VendorId
     */
    private $vendorId;

    public function __construct(?Manifest $manifest, ?Manifest $skillManifest = null, ?VendorId $vendorId = null)
    {
        $this->manifest = $manifest;
        $this->skillManifest = $skillManifest;
        $this->vendorId = $vendorId;
    }

    public function getManifest(): ?Manifest
    {
        return $this->manifest;
    }

    public function getSkillManifest(): ?Manifest
    {
        return $this->skillManifest;
    }

    public function getVendorId(): ?VendorId
    {
        return $this->vendorId;
    }
}
