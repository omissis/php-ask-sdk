<?php

namespace Omissis\AlexaSdk\Model\Skill\Manifest\Events;

final class Subscription
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
