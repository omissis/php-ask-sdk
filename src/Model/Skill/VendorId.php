<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill;

final class VendorId
{
    /**
     * @var string
     */
    private $vendorId;

    public function __construct(string $vendorId)
    {
        $this->vendorId = $vendorId;
    }

    public function __toString(): string
    {
        return $this->vendorId;
    }
}
