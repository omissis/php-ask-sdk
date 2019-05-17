<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill;

final class Id
{
    private const SKILL_ID_PATTERN = '/^amzn\d+\.ask\.skill\.[0-9a-f]{8}\-[0-9a-f]{4}\-[0-9a-f]{4}\-[0-9a-f]{4}\-[0-9a-f]{12}$/';

    /**
     * @var string
     */
    private $skillId;

    /**
     * @throws InvalidIdFormatException
     */
    public function __construct(string $skillId)
    {
        if (preg_match(self::SKILL_ID_PATTERN, $skillId) !== 1) {
            throw new InvalidIdFormatException($skillId);
        }

        $this->skillId = $skillId;
    }

    public function __toString(): string
    {
        return $this->skillId;
    }
}
