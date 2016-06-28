<?php

namespace Issuetracker\Domain\Event;


abstract class Event
{
    /**
     * @var \DateTimeImmutable
     */
    protected $occurredOn;

    /**
     * @var int
     */
    protected $eventVersion = 1;

    public function occurredOn() :\DateTimeImmutable
    {
        return $this->occurredOn;
    }

    public function eventVersion() :int
    {
        return $this->eventVersion;
    }
}