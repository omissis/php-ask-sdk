<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Events;

/*final */class EventName
{
    /**
     * @var string
     */
    private $eventName;

    public function __construct(string $eventName)
    {
        $this->eventName = $eventName;
    }

    public function __toString(): string
    {
        return $this->eventName;
    }
}
