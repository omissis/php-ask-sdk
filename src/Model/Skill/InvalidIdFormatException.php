<?php

declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill;

use Omissis\AlexaSdk\Model\Exception;

final class InvalidIdFormatException extends Exception
{
    /**
     * @var string
     */
    private $wrongSkillId;

    public function __construct(string $wrongSkillId)
    {
        $this->wrongSkillId = $wrongSkillId;

        parent::__construct(sprintf('Invalid id format: "%s".', $wrongSkillId));
    }

    public function getWrongSkillId(): string
    {
        return $this->wrongSkillId;
    }
}
