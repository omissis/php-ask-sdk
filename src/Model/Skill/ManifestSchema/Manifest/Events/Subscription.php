<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Events;

/*final */class Subscription
{
    /**
     * @var EventName
     */
    private $eventName;

    public function __construct(EventName $eventName)
    {
        $this->eventName = $eventName;
    }

    public function getEventName(): EventName
    {
        return $this->eventName;
    }
}
