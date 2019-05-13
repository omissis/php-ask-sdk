<?php

namespace Omissis\AlexaSdk\Model\Skill;

final class Stage
{
    public const ALLOWED_STAGES = ['development', 'live'];

    /**
     * @var string
     */
    private $stage;

    /**
     * @throws InvalidStageException
     */
    public function __construct(string $stage)
    {
        if (!in_array($stage, self::ALLOWED_STAGES, true)) {
            throw new InvalidStageException($stage);
        }

        $this->stage = $stage;
    }

    public function __toString(): string
    {
        return $this->stage;
    }
}
