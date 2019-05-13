<?php

declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\Manifest\PublishingInformation;

use Omissis\AlexaSdk\Model\Exception;

final class InvalidDistributionModeException extends Exception
{
    /**
     * @var string
     */
    private $invalidDistributionMode;

    public function __construct(string $invalidInvalidDistributionMode)
    {
        $this->invalidDistributionMode = $invalidInvalidDistributionMode;

        parent::__construct(sprintf(
            'Invalid distributionMode name: "%s". Allowed values are: "%s".',
            $invalidInvalidDistributionMode,
            implode(', ', DistributionMode::ALLOWED_DISTRIBUTION_MODES)
        ));
    }

    public function getInvalidDistributionMode(): string
    {
        return $this->invalidDistributionMode;
    }
}
