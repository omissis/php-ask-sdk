<?php

declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill;

use Omissis\AlexaSdk\Model\Exception;

final class InvalidStageException extends Exception
{
    /**
     * @var string
     */
    private $wrongStageName;

    public function __construct(string $wrongStageName)
    {
        $this->wrongStageName = $wrongStageName;

        parent::__construct(sprintf(
            'Invalid stage name: "%s". Allowed values are: "%s".',
            $wrongStageName,
            implode(', ', Stage::ALLOWED_STAGES)
        ));
    }

    public function getWrongStageName(): string
    {
        return $this->wrongStageName;
    }
}
