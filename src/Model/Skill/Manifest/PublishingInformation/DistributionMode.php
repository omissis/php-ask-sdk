<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\Manifest\PublishingInformation;

final class DistributionMode
{
    public const ALLOWED_DISTRIBUTION_MODES = ['PUBLIC', 'PRIVATE'];

    /**
     * @var string
     */
    private $distributionMode;

    /**
     * @throws InvalidDistributionModeException
     */
    public function __construct(string $distributionMode)
    {
        if (!in_array($distributionMode, self::ALLOWED_DISTRIBUTION_MODES, true)) {
            throw new InvalidDistributionModeException($distributionMode);
        }

        $this->distributionMode = $distributionMode;
    }

    public function __toString(): string
    {
        return $this->distributionMode;
    }
}
