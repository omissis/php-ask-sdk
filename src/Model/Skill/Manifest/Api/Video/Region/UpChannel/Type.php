<?php

declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\Manifest\Api\Video\Region\UpChannel;

final class Type
{
    /**
     * @var string
     */
    private $type;

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    public function __toString(): string
    {
        return $this->type;
    }
}
